<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
//Request
use App\Http\Requests\ScheduleCourseSubject\StoreScheduleCourseSubjectRequest;

//Models
use App\Models\ScheduleCourseSubject; 
use App\Models\User;
use App\Models\Course;
use App\Models\CourseInstructor;
use App\Models\Schedule;
use App\Models\CourseSubject;

//Facades
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;


class ScheduleCourseSubjectController extends Controller
{
    //
     public function index(Request $request) { 

    }

    public function store(StoreScheduleCourseSubjectRequest $request, String $schedule) {

        $validated = $request->validated(); 

        $days = [];

        if($validated['day_type'] == 'MW') { 
            $days[] = 'Monday';
            $days[] = 'Wednesday';
        }

        if($validated['day_type'] == 'TTH') { 
            $days[] = 'Tuesday';
            $days[] = 'Thursday';
        }

        if($validated['day_type'] == 'F') { 
            $days[] = 'Friday';
        }

        if($validated['day_type'] == 'S') { 
            $days[] = 'Saturday';
        }
 
        DB::beginTransaction();

        $ci = CourseInstructor::find($schedule);
        $starts_at = Carbon::createFromTimeString($validated['starts_at']);
        $ends_at = Carbon::createFromTimeString($validated['ends_at']);

        try{ 
            $vcs = Schedule::whereIn('day', $days)->where('sender_id', $ci->faculty_id)->get();
            $validated_scs = CourseSubject::where('id', $validated['course_subject_id'])->first();

            $cooked_subjects = $validated_scs->where([
                ['year', '=', $validated_scs->year],
                ['semester', '=', $validated_scs->semester],
                ['course_id', '=', $validated_scs->course_id]
            ])->whereHas('schedule_course_subject', function($q) use($days){
                return $q->whereIn('day', $days);
            })->get(); 

            $hasConflict = false;
            
            foreach($cooked_subjects as $cooked_subject) { 
                $s = Carbon::createFromTimeString($cooked_subject->schedule_course_subject->starts_at);
                $e = Carbon::createFromTimeString($cooked_subject->schedule_course_subject->ends_at);

                if(($starts_at->between($s, $e) || $ends_at->between($s,$e))) { 
                    $hasConflict = true;

                    break;
                }
            } 

            if($hasConflict) { 
                return back()->with('status', [
                    'success' => false, 
                    'message' => 'Error', 
                    'description' => 'It has conflict with other subject',
                ]);   
            }
        
            $cooked_day = [];

            foreach($vcs as $vc) { 
                $s = Carbon::createFromTimeString($vc->starts_at);
                $e = Carbon::createFromTimeString($vc->ends_at);

                if($starts_at->between($s, $e) && $ends_at->between($s,$e)) { 
                    $cooked_day[] = $vc->day;
                }
            }
            
            if(count($cooked_day) == 0){         
                return back()->with('status', [
                    'success' => false, 
                    'message' => 'Error', 
                    'description' => 'No available schedule for this subject',
                ]);
            }

            $fd = collect($cooked_day)->unique()->toArray();

            if(in_array('Monday', $cooked_day) && in_array('Wednesday', $cooked_day)) { 
                
                foreach($fd as $day) { 
                    $scs = new ScheduleCourseSubject;
                    $scs->faculty_id = $ci->faculty_id;
                    $scs->user_id = Auth::id(); 
                    $scs->course_subject_id = $validated['course_subject_id'];
                    $scs->day = $day;
                    $scs->status = 'pending';
                    $scs->starts_at = $validated['starts_at'];
                    $scs->ends_at = $validated['ends_at'];

                    $scs->save();
                }
            }

            if(in_array('Tuesday', $cooked_day) && in_array('Thursday', $cooked_day)) { 
                 foreach($fd as $day) { 
                    $scs = new ScheduleCourseSubject;
                    $scs->faculty_id = $ci->faculty_id;
                    $scs->user_id = Auth::id(); 
                    $scs->course_subject_id = $validated['course_subject_id'];
                    $scs->day = $day;
                    $scs->status = 'pending';
                    $scs->starts_at = $validated['starts_at'];
                    $scs->ends_at = $validated['ends_at'];

                    $scs->save();
                }

            }

            if(in_array('Friday', $cooked_day)) { 
                foreach($fd as $day) { 
                    $scs = new ScheduleCourseSubject;
                    $scs->faculty_id = $ci->faculty_id;
                    $scs->user_id = Auth::id(); 
                    $scs->course_subject_id = $validated['course_subject_id'];
                    $scs->day = $day;
                    $scs->status = 'pending';
                    $scs->starts_at = $validated['starts_at'];
                    $scs->ends_at = $validated['ends_at'];

                    $scs->save();
                }
            }

            if(in_array('Saturday', $cooked_day)) {
                 foreach($fd as $day) { 
                    $scs = new ScheduleCourseSubject;
                    $scs->faculty_id = $ci->faculty_id;
                    $scs->user_id = Auth::id(); 
                    $scs->course_subject_id = $validated['course_subject_id'];
                    $scs->day = $day;
                    $scs->status = 'pending';
                    $scs->starts_at = $validated['starts_at'];
                    $scs->ends_at = $validated['ends_at'];

                    $scs->save();
                }
            }

        }catch(\Exception $e){
            DB::rollback();

            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'Error'. $e,
            ]);
        }

        DB::commit();
               
        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Schedule was successfully assigned to Instructor',
        ]);

    }
}
