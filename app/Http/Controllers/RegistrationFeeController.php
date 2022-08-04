<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Facades
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\RegistrationFee;
use App\Models\SchoolYear;
use App\Models\Enrollment;

//Others
use Yajra\DataTables\DataTables;

//Request
use App\Http\Requests\RegistrationFee\StoreRegistrationFeeController;

class RegistrationFeeController extends Controller
{
    //
    public function index(Request $request) { 

        if($request->ajax()){ 
            $registration_fees = RegistrationFee::get(); 

            return DataTables::of($registration_fees)
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                    return $btn;
                })
                ->addColumn('amount', function($row){
                    return '₱ '.$row->amount / 100;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
        return view('registration_fee.index');
    }

    public function create() { 
        return view('registration_fee.create');
    }

    public function store(StoreRegistrationFeeController $request) { 
        $validated = $request->validated();

        $school_year = SchoolYear::orderBy('id', 'DESC')->first();

        if(is_null($school_year)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'School Year was not found. Please contact the administrator',
            ]);
        }

        $semester = Enrollment::where('school_year_id', $school_year->id)->orderBy('id', 'DESC')->first();

        if(is_null($semester)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'No Semester schedule yet. Please contact the administrator',
            ]);
        }

        $registration_fee = new RegistrationFee; 
        $registration_fee->semester_id = $semester->id;
        $registration_fee->user_id = Auth::id();
        $registration_fee->amount = $validated['amount'] * 100;
        $registration_fee->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Registration Fee successfully added',
        ]);
        
    }
}
