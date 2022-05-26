<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

//Models
use App\Models\Student; 
use App\Models\Subject; 
use App\Models\Miscellaneous; 
use App\Models\Other; 
use App\Models\SchoolYear;

class StudentController extends Controller
{
    //
    public function index(Request $request) { 

        if($request->ajax()){ 

            $students = Student::whereHas('application' ,function($query) use ($request) { 

                if ($request->has('course')) {
                    $query->where('course_id', $request->input('course'));
                }

                if($request->has('semester')) { 
                    $query->where('course_id', $request->input('semester'));

                }

                if($request->has('year')) { 
                    $year = $request->input('year');
                    $query->where('course_id', $request->input('year'));
                }

                 $query->where('status', '=', 'enrolled');
                
            })->whereNotNull('student_number')->get(); 
  
            return DataTables::of($students)
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('students.show', ['student' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('student.index');
    }

    public function show(Student $student, Request $request) {

        $application = $student->application->where('status', 'enrolled')->last();
        $sy = SchoolYear::orderByDesc('id')->first();
        $now = \Carbon\Carbon::now();
        $semester = $sy->enrollment->where('is_active', 1)->first();
        $pricing = $application->course->pricing->where('semester_id', $semester->id)->first();

        if($request->ajax()){ 
            $subjects = $application->application_subject;

            return DataTables::of($subjects)
                ->addColumn('subject', function($row){
                    return $row->subject->description;
                })
                ->addColumn('leclab', function($row){
                    return $row->subject->lec.' / '.$row->subject->lab;
                })
                ->addColumn('pricing', function($data) use ($pricing) {

                    if(is_null($pricing)) { 
                        return 'N/A';
                    }
                
                    $lab_price = $pricing->lab_price / 100;
                    $lec_price = $pricing->lec_price / 100;
                    $lab = $data->subject->lab;
                    $lec = $data->subject->lec;

                    return '₱ '.($lab_price * $lab) + ($lec_price * $lec);
                })
                ->make(true);
        }

        $total = 0;
        
        if(!is_null($pricing)) { 

            $miscellaneous  = Miscellaneous::where('course_miscellaneous_id', $application->course_miscellaneous_id)->get();
            $other = $application->course_other;
            
            $miscellaneous_total = $miscellaneous->sum('price') / 100;
            $other_total = $other->other_item->sum('price') / 100;
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
            $discounted = $course_total * $discount;
            $total = ($payable - $transactions) - $discounted;
            
        }
        
        return view('student.show',compact('student', 'application', 'total')); 
    }
}

