<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Course; 
use App\Models\Subject; 
use App\Models\CourseSubject; 

// Requests
use App\Http\Requests\StoreCourseSubjectRequest;

//Others
use Yajra\DataTables\DataTables;


class CourseSubjectController extends Controller
{
    //
    public function index(Request $request) { 
        $datas = CourseSubject::with(['course', 'subject'])->where('course_id', $request->id)->get(); 
    
        if($request->ajax()){ 
            return DataTables::of($datas)
                    ->addColumn('subject_code', function($data) {
                        return $data->subject->subject_code;
                    }) 
                    ->addColumn('description', function($data) {
                        return $data->subject->description;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('courses.subjects', ['id' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('course-subject.index');
    }

    public function getAllSubjects(Request $request) {
     
       
    }

    public function show(String $id, Request $request) {
         $ids = CourseSubject::select('subject_id')->with(['course', 'subject'])->where('course_id', $id)->get(); 
 
        $datas = Subject::whereNotIn('id',  $ids)->get();

        if($request->ajax()){ 
            return DataTables::of($datas)
                    ->addColumn('action', function($row){
                        $btn = '<a href="#" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function create() { }

    public function store(String $id, StoreCourseSubjectRequest $request) { 
        $validated = $request->validated(); 

        $course = Course::findOrFail($id);
        $courseSubject = new CourseSubject;

        $courseSubject->course_id = $course->id; 
        $courseSubject->subject_id =  $validated['id']; 
        $courseSubject->year = $validated['year']; 
        $courseSubject->semester = $validated['semester'];

        if(is_not_null($validated['prerequisite_id'])) { 
            $courseSubject->prerequisite_id = $validated['prerequisite_id'];
        }

        $courseSubject->save();
    }
}
