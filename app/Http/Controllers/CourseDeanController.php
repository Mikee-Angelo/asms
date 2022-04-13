<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\CourseDean; 
use App\Models\User; 
use App\Models\Course; 

//Requests
use App\Http\Requests\CourseDean\StoreCourseDeanRequest;

class CourseDeanController extends Controller
{
    
    public function store(StoreCourseDeanRequest $request, Course $course) { 
        $validated = $request->validated(); 

        $courseDean = new CourseDean;

        $courseDean->faculty_id = $validated['faculty_id'];
        $courseDean->course_id = $course->id; 
        $courseDean->save(); 

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Dean assigned to course successfully',
        ]);
    }

    public function create(Course $course) { 
        $courseDeans = User::role('Dean')->get();

        $id = $course->id;

        return view('course.dean.create', compact('courseDeans', 'course'));
    }
}
