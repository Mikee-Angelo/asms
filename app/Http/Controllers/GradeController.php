<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Student;
use App\Models\Subject;
use App\Models\Application;

//Request
use App\Http\Requests\Grade\StoreGradeRequest;

class GradeController extends Controller
{
    //
    public function create(Subject $subject, Student $student) { 
        $application = Application::orderBy('id', 'DESC')->where([
            ['status', '=', 'enrolled'],
            ['student_id', '=', $student->id ]
        ])->first();
        
        $terms = [];

        $subject = $application->application_subject->where('subject_id', $subject->id)->first();
        
        if($subject->prelim == null) { 
            $terms[] = 'Prelim';
        }

        if($subject->midterm == null) { 
            $terms[] = 'Midterm';
        }

        if($subject->prefinal == null) { 
            $terms[] = 'Prefinal';
        }

        if($subject->final == null) { 
            $terms[] = 'Final';
        }

        return view('grade.create', compact('terms'));
    }

    public function store(Subject $subject, Student $student, StoreGradeRequest $request) {
        $validated = $request->validated(); 
        
        $application = Application::orderBy('id', 'DESC')->where([
            ['status', '=', 'enrolled'],
            ['student_id', '=', $student->id ]
        ])->first();

        $subject = $application->application_subject->where('subject_id', $subject->id)->first();


        if($validated['term'] == 'Prelim') { 
            $term = 'prelim';

            $subject->update([
                $term => $validated['grade'] * 100,
            ]);

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Grade successfully added',
            ]);
        }

        if($validated['term'] == 'Midterm' && !is_null($subject->prelim)) { 
            $term = 'midterm';

            $subject->update([
                $term => $validated['grade'] * 100,
            ]);

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Grade successfully added',
            ]);
        }

        if($validated['term'] == 'Prefinal' && !is_null($subject->midterm)) { 
            $term = 'prefinal';

             $subject->update([
                $term => $validated['grade'] * 100,
            ]);

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Grade successfully added',
            ]);
        }

        if($validated['term'] == 'Final' && !is_null($subject->prefinal)) { 
            $term = 'final';
            $subject->update([
                $term => $validated['grade'] * 100,
            ]);

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Grade successfully added',
            ]);
        }
  
        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Grade successfully added',
        ]);
    }
}
