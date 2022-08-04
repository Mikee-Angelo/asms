<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\User; 
use App\Models\Course; 
use App\Models\CourseInstructor;

//Others
use Yajra\DataTables\DataTables;

//Request
use App\Http\Requests\CourseInstructor\StoreCourseInstructorRequest;

class CourseInstructorController extends Controller
{
    //
    public function index(Course $course, Request $request) { 

        $instructors = CourseInstructor::with('faculty')->where('course_id', $course->id)->get(); 

        if($request->ajax()){ 

            return DataTables::of($instructors)
                    ->addColumn('name', function($row) {
                        return $row->faculty->name;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function create(Course $course) {

        $instructors = User::role('Instructor')->doesntHave('course_instructor')->get();

        return view('course.instructor.create', compact('course', 'instructors'));
    }

    public function store(StoreCourseInstructorRequest $request, Course $course) { 
        $validated = $request->validated(); 

        $instructor = new CourseInstructor;

        $instructor->course_id = $course->id;
        $instructor->faculty_id = $validated['faculty_id'];
        $instructor->status = $validated['status'] ?? true;

        $instructor->save();

         return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Instructor was successfully assigne to course',
        ]);
    }
}
