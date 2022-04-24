<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

//Models
use App\Models\Student; 
use App\Models\Subject; 
use App\Models\Miscellaneous; 
use App\Models\Other; 

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
                        $btn = '<a href="'.route('students.show', ['student' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('student.index');
    }

    public function show(Student $student, Request $request) {

        $application = $student->application->where('status', 'enrolled')->last();
        $pricing = $application->course->pricing;

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
            
            $total = $course_total + $miscellaneous_total + $course_total;
        }

        return view('student.show',compact('student', 'application', 'total')); 
    }
}

