<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\ApplicationTransaction; 
use App\Models\Application; 
use App\Models\Discount; 
use App\Models\RegistrationFee;
use App\Models\Miscellaneous;
use App\Models\Other;

//Requests
use App\Http\Requests\ApplicationTransaction\StoreApplicationTranscationRequest;

class ApplicationTransactionController extends Controller
{
    //
    public function index(Application $application, Request $request) {
        if($request->ajax()){ 

            $transactions = ApplicationTransaction::where('application_id', $application->id )->get(); 
            
            return DataTables::of($transactions)
                ->addColumn('amount', function($row){
                    return '₱ '. $row->amount / 100 ;
                })
                ->addColumn('created_at', function($row){
                    return Carbon::parse($row->created_at)->format('F d, Y H:i:s');
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }
    public function create(Application $application) { 

        $types = ['Payment', 'Registration'];
        $discounts = [];
        
        if(in_array($application->status, ['enrolled'])) { 
            unset($types[1]);   
             
        }else{ 
            unset($types[0]);
            $discounts = Discount::get();

        }


        return view('application-payment.create', compact('types', 'discounts'));
    }

    public function store(Application $application, StoreApplicationTranscationRequest $request) { 
        $validated = $request->validated(); 

        $registration_fees = RegistrationFee::latest()->first();
        $amount = $validated['amount'] * 100;
        
        if(is_null($registration_fees)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Oops', 
                'description' => 'No registration fee found. Please set it to fees tab',
            ]);
        }

        if(($amount < $registration_fees->amount) && ($application->application_transaction->count() == 0)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Payment Failed', 
                'description' => 'Paid amount is lower than registration fee.',
            ]);
        }
        
        $pricing = $application->course->pricing->where('semester_id', $application->semester_id)->first();
        $miscellaneous  = Miscellaneous::get();
        $other = Other::get();
        
        $miscellaneous_total = $miscellaneous->sum('price') / 100;
        $other_total = $other->sum('price') / 100;
        $course_total = 0;

        foreach($application->application_subject as $data) { 
            $lec_price = $pricing->lec_price / 100; 
            $lab_price = $pricing->lab_price / 100;
            $lec = $data->subject->lec;
            $lab = $data->subject->lab;

            
            $course_total += ($lec_price * $lec) + ($lab_price * $lab);
        }

        $transactions = $application->application_transaction->sum('amount') / 100;
        $discount = is_null($application->discount) ? 0 : ($application->discount->discount / 100);
        $payable = ($other_total + $miscellaneous_total + $course_total);
        $discounted = $payable * $discount;
        $total = ($payable - $transactions) - $discounted;
        
        if($amount > ($total * 100)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Payment Failed', 
                'description' => 'Payment exceeds the remaining balance.',
            ]);
        }
        
        DB::beginTransaction();

        try { 
            if($application->application_transaction->count() == 0) { 
                Application::where('id', $application->id)->update([
                    'status' => 'enrolled',
                    'discount_id' => $validated['discount'],
                    'enrolled_at' => Carbon::now(),
                ]);
            } 
            
            $at = new ApplicationTransaction; 
            $at->application_id = $application->id;
            $at->type = $validated['type'];
            $at->description = $validated['description']; 
            $at->amount = $amount; 
            $at->save(); 

        }catch(\Exception $e) { 
            DB::rollback();

            return back()->with('status', [
                'success' => false, 
                'message' => 'Oops', 
                'description' => $e->getMessage(),
            ]);
        }

        DB::commit();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Payment successfully added',
        ]);
    }
}
