<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\Course; 
use App\Http\Requests\AddCourseRequest;

class CourseController extends Controller
{
    //
    public function index(Request $request) { 

        $courses = Course::get(); 

        if($request->ajax()){ 
            return DataTables::of($courses)
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('course.index');
    }

    public function show(Course $course) {}


    public function create() {  
        return view('course.create');
    }

    public function store(AddCourseRequest $request) { 
        $validated = $request->validated(); 

        $course = new Course; 

        $course->department_id = $validated['department_id'];
        $course->code = $validated['code']; 
        $course->course_name = $validated['course_name']; 
        $course->type = $validated['type']; 
        $course->status = 1;

        $course->save();

        return redirect('courses/create')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Course successfully added',
        ]);
    }
}
