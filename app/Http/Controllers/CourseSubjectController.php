<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
    public function index(String $id, Request $request) {
        $year = 1;
        $semester = 1; 
        
        if(!is_null($request->query('semester'))) { 
            $semester = $request->query('semester');
        }

        if(!is_null($request->query('year'))) { 
            $year = $request->query('year');
        }
        
        $datas = CourseSubject::with(['course', 'subject'])->where([
            ['course_id', '=', $id],
            ['year', '=', $year],
            ['semester', '=', $semester],
        ])->get(); 
        
        if($request->ajax()){ 
            return DataTables::of($datas)
                    ->addColumn('subject_code', function($data) {
                        return $data->subject->subject_code;
                    }) 
                    ->addColumn('description', function($data) {
                        return $data->subject->description;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</button>';
                        return $btn;
                    })
                    ->addColumn('day', function($row) { 
                        $day = null;

                        if(is_null($row->schedule_course_subject)) {
                            return 'N/A';
                        }

                        if($row->schedule_course_subject->day == 'Monday' || $row->schedule_course_subject->day == 'Wednesday') { 
                            $day = 'MW'; 
                        }

                        if($row->schedule_course_subject->day == 'Tuesday' || $row->schedule_course_subject->day == 'Thursday') { 
                            $day = 'TTH';
                        }

                        if($row->schedule_course_subject->day == 'Friday') { 
                            $day = 'FRI';
                        }

                        if($row->schedule_course_subject->day == 'Saturday') { 
                            $day = 'SAT';
                        }

                        return $day;

                    })
                    ->addColumn('time', function($row) { 
                        return !is_null($row->schedule_course_subject) ? Carbon::parse($row->schedule_course_subject->starts_at)->format('g:i A'). '-'. Carbon::parse($row->schedule_course_subject->ends_at)->format('g:i A') : 'N/A';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }


        return view('course-subject.index');
    }

    public function getAllSubjects(Request $request) {
     
       
    }

    public function show(String $id, Request $request) {
        $ids = CourseSubject::select('subject_id')->with([ 'subject'])->where('course_id', $id)->pluck('subject_id'); 
        
        if($ids->count() > 0) { 
            $datas = Subject::whereNotIn('id',  array_values($ids->toArray()))->get();
        }else{
            $datas = Subject::get();
        }

        if($request->ajax()){ 
            return DataTables::of($datas)
                    ->addColumn('action', function($row){
                        $btn = '<buttpon type="button" data-remote="'.$row->id.'" class="add-button inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add</button>';
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
        
        $validateCourse = CourseSubject::where([
            ['course_id', '=', $course->id],
            ['subject_id', '=', $validated['subject_id']],
            ['year', '=', $validated['year']],
            ['semester', '=', $validated['semester']],
        ])->first();

        if(!is_null($validateCourse)) { 
            return ;
        }
        
        $courseSubject = new CourseSubject;

        $courseSubject->course_id = $course->id; 
        $courseSubject->subject_id =  $validated['subject_id']; 
        $courseSubject->year = $validated['year']; 
        $courseSubject->semester = $validated['semester'];
        
        if(!is_null($validated['prerequisite_id'])) { 
            $courseSubject->prerequisite_id = $validated['prerequisite_id'];
        }

        $courseSubject->save();
    }
}
