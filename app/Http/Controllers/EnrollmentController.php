<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//Models
use App\Models\Enrollment;
use App\Models\SchoolYear;

//Others
use Yajra\DataTables\DataTables;

//Requests
use App\Http\Requests\Enrollment\StoreEnrollmentRequest;

class EnrollmentController extends Controller
{
    //
    public function index(Request $request, SchoolYear $school_year) {  

        if($request->ajax()){ 
            $enrollments = Enrollment::get();

            return DataTables::of($enrollments)
                    ->addColumn('starts_at', function($row){
                        return Carbon::parse($row->starts_at)->format('F d, Y');
                    }) 
                    ->addColumn('ends_at', function($row){
                        return Carbon::parse($row->ends_at)->format('F d, Y');
                    }) 
                    ->addColumn('restricted_date', function($row){
                        return Carbon::parse($row->restricted_date)->format('F d, Y');
                    }) 
                    ->addColumn('action', function($row) use ($school_year) {
                        $btn = '<a href="'.route('school-year.enrollment.show', ['school_year' => $school_year->id, 'enrollment' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function create(SchoolYear $school_year) {

        return view('school-year.enrollment.create', compact('school_year'));
    }

    public function store(StoreEnrollmentRequest $request, SchoolYear $school_year){ 
        $validated = $request->validated(); 

        $count = $school_year->enrollment->count();

        if($count < 2) { 
            $s = Carbon::parse($school_year->starts_at);
            $e = Carbon::parse($school_year->ends_at);
            $starts_at = Carbon::parse($validated['starts_at']);
            $ends_at = Carbon::parse($validated['ends_at']);
            $restricted_date = Carbon::parse($validated['restricted_date']);

            $enrollment = new Enrollment;

            $enrollment->user_id = Auth::id();
            $enrollment->school_year_id = $school_year->id;
            $enrollment->starts_at = $validated['starts_at'];
            $enrollment->ends_at = $validated['ends_at'];
            $enrollment->restricted_date = $validated['restricted_date'];

            $enrollment->save();

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Enrollment date successfully added',
            ]);
        }

        return back()->with('status', [
            'success' => false, 
            'message' => 'Oops!', 
            'description' => 'Something went wrong',
        ]);

    }   
}
