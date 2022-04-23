<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\ApplicationTransaction; 
use App\Models\Application; 

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
                    return Carbon::parse($row->created_at)->format('F d, y H:i:s');
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

    }
    public function create() { 
        $types = ['Payment', 'Registration'];

        return view('application-payment.create', compact('types'));
    }

    public function store(Application $application, StoreApplicationTranscationRequest $request) { 
        $validated = $request->validated(); 

        $at = new ApplicationTransaction; 
        $at->application_id = $application->id;
        $at->type = $validated['type'];
        $at->description = $validated['description']; 
        $at->amount = $validated['amount'] * 100; 
        $at->save(); 

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Payment successfully added',
        ]);
    }
}
