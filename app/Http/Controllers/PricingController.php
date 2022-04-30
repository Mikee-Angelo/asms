<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

//Models
use App\Models\Pricing;
use App\Models\Course; 
use App\Models\CourseSubject; 
use App\Models\Enrollment; 
use App\Models\SchoolYear; 

//Facades
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

//Others
use Yajra\DataTables\DataTables;

//Requests
use App\Http\Requests\Pricing\StorePricingRequest; 

class PricingController extends Controller
{
    //
    public function index(Request $request) {

        if($request->ajax()){ 
            $datas = Pricing::with('course')->get(); 

            return DataTables::of($datas)
                    ->addColumn('lec_price', function($data){
                        return '₱ '. $data->lec_price / 100; 
                    })
                    ->addColumn('lab_price', function($data){
                        return '₱ '. $data->lab_price / 100;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('pricings.show', ['pricing' => $row]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('pricing.index');
    }

    public function create(){ 
        $courses = Course::where('status', 1)->get();

        return view('pricing.create', compact('courses'));
    }

    public function show(Pricing $pricing, Request $request) { 
        $year = 1;
        $semester = 1; 
        
        if(!is_null($request->query('semester'))) { 
            $semester = $request->query('semester');
        }

        if(!is_null($request->query('year'))) { 
            $year = $request->query('year');
        }
    
        if($request->ajax()){ 

            $datas = CourseSubject::with(['course', 'subject'])->where([
                ['course_id', '=', $pricing->course->id],
                ['year', '=', $year],
                ['semester', '=', $semester],
            ])->get(); 
            
            return DataTables::of($datas)
                    ->addColumn('subject_code', function($data) {
                        return $data->subject->subject_code;
                    }) 
                    ->addColumn('description', function($data) {
                        return $data->subject->description;
                    })
                    ->addColumn('units', function($data) {
                        return $data->subject->lec . ' / '. $data->subject->lab;
                    })
                     ->addColumn('amount', function($data) {
                        $lec_total = ($data->course->pricing->lec_price / 100) * $data->subject->lec;
                        $lab_total = ($data->course->pricing->lab_price / 100) * $data->subject->lab;

                        $sum = $lec_total + $lab_total; 

                        return '₱ '. $sum;
                    })
                    ->make(true);
        }

        return view('pricing.show', compact('pricing')); 
    }

    public function store(StorePricingRequest $request) {
        $validated = $request->validated();
        
        $courses = array_keys($validated['course']);
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

        $payload = [];

        foreach($courses as $course) { 
            $payload[] = [
                'semester_id' => $semester->id,
                'user_id' => Auth::id(),
                'course_id' => $course, 
                'lec_price' => $validated['lec_price'] * 100,
                'lab_price' =>  $validated['lab_price'] * 100,
            ];
        }

        DB::transaction(function () use ($payload){
            Pricing::insert($payload);
        });
    
        return redirect('pricings/create')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Tuition Fee successfully added',
        ]);
    }
}
