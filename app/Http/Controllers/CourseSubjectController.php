<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Course; 
use App\Models\Subject; 
use App\Models\CourseSubject; 
use App\Models\Curriculum; 
use App\Models\SchoolYear; 

// Requests
use App\Http\Requests\StoreCourseSubjectRequest;

//Others
use Yajra\DataTables\DataTables;


class CourseSubjectController extends Controller
{
    //
    public function index(String $id, Request $request) {
       
        
        if($request->ajax()){ 
            $school_year = null;
            $year = 1;
            $semester = 1; 
            
            if(!is_null($request->query('semester'))) { 
                $semester = $request->query('semester');
            }

            if(!is_null($request->query('year'))) { 
                $year = $request->query('year');
            }

            if(!is_null($request->query('school_year'))) { 
                $sy = SchoolYear::orderBy('id', 'DESC')->where('id', $request->query('school_year'))->first();

                $school_year = $sy->id ?? 0 ;
            }else{ 
                $sy = SchoolYear::orderBy('id', 'DESC')->first();

                $school_year = $sy->id ?? 0;
            }

            // dd($sy);

            $curriculum = Curriculum::where('is_default', 1)->first();
            
            $datas = CourseSubject::where([
                ['course_id', '=', $id],
                ['year', '=', $year],
                ['semester', '=', $semester],
            ])->whereHas('subject', function($row) use ($curriculum) { 
                if(!is_null($curriculum)) { 
                    return $row->where('curriculum_id', $curriculum->id);
                }
            })->with('schedule_course_subject', function($row) use ($school_year) { 
                return $row->where('school_year_id', $school_year);
 
            })->get(); 
            
            return DataTables::of($datas)
                    ->addColumn('subject_code', function($data) {
                        return $data->subject->subject_code;
                    }) 
                    ->addColumn('description', function($data) {
                        return $data->subject->description;
                    })
                    ->addColumn('lec', function($data) {
                        return $data->subject->lec;
                    })
                    ->addColumn('lab', function($data) {
                        return $data->subject->lab;
                    })
                    ->addColumn('pricing', function($data) use($semester) {

                        if(is_null($data)) return 'N/A';

                        $pricing = null;

                        if($semester == 1) { 
                           $pricing = $data->course->pricing->first();
                        }else{ 
                            $pricing = $data->course->pricing->last();
                        }
                        

                        $lab_price = ($pricing->lab_price ?? 0) / 100;
                        $lec_price = ($pricing->lec_price ?? 0) / 100;

                        $lab = $data->subject->lab;
                        $lec = $data->subject->lec;

                        return '₱ '.($lab_price * $lab) + ($lec_price * $lec);
                    })
                    ->addColumn('room', function($row) {
                        $data = null;

                        if((!is_null($row->schedule_course_subject) && count($row->schedule_course_subject) > 0)){ 
                                $schedule_room = $row->schedule_course_subject->first()->schedule_room;

                            if(!is_null($data)) { 
                               $data = $schedule_room->room->name;
                            }

                        }

                        return $data ?? 'N/A';

                    })
                    ->addColumn('action', function($row){
                        $btn = null ;

                        if(!is_null($row->schedule_course_subject) && Auth::user()->hasRole('Super Admin')) { 
                            $btn = '<a href="'.route('course.subject.room.create', ['course' => $row->course_id, 'subject' => $row->subject_id ]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Assign Room</a>';
                        }
            
                        return $btn;
                    })
                    ->addColumn('day', function($row) { 
                        $schedule = null;

                        if(is_null($row->schedule_course_subject)) {
                            return 'N/A';
                        }

                        $day = $row->schedule_course_subject->pluck('day');
                        
                        if(in_array('Monday', $day->toArray()) && in_array('Wednesday', $day->toArray())) {
                            $schedule = 'MW';
                        } elseif(in_array('Tuesday', $day->toArray()) && in_array('Thursday', $day->toArray())) {
                            $schedule = 'TTH';
                        } elseif(in_array('Friday', $day->toArray())) { 
                            $schedule = 'FRI';
                        } elseif(in_array('Saturday', $day->toArray())) { 
                            $schedule = 'SAT';
                        } 

                        return $schedule;

                    })
                    ->addColumn('time', function($row){ 

                        if(!is_null($row->schedule_course_subject) && count($row->schedule_course_subject) > 0) { 
                          
                            return Carbon::parse($row->schedule_course_subject->first()->starts_at)->format('g:i A'). '-'. Carbon::parse($row->schedule_course_subject->first()->ends_at)->format('g:i A');
                        }

                        return 'N/A';
                        
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
