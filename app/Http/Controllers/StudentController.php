<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Student; 

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

    public function show(Student $student) {
        return view('student.show',compact('student')); 
    }
}

