<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Models
use App\Models\Course;
use App\Models\Subject;
use App\Models\Building;
use App\Models\Room;
use App\Models\Curriculum;
use App\Models\SchoolYear;
use App\Models\CourseSubject;
use App\Models\ScheduleRoom;
use App\Models\ScheduleCourseSubject;


//Request
use App\Http\Requests\ScheduleRoom\StoreScheduleRoomRequest;

class ScheduleRoomController extends Controller
{
    //
    public function create(Course $course, Subject $subject, Request $request) { 

        $buildings = Building::get();
        $room = null;

        if($request->has('building')) { 
            $rooms = Room::where('building_id',$request->input('building'))->get();
        }else{ 
            $rooms = Room::get();
        }
        
        
        return view('course-subject-room.create', compact('buildings', 'rooms', 'subject'));
    }

    public function store(Course $course, Subject $subject, StoreScheduleRoomRequest $request) { 
        $validated = $request->validated();
        
        $curriculum = Curriculum::where('is_default', 1)->first();
        $school_year = SchoolYear::orderBy('id', 'DESC')->first();

        $scs = ScheduleCourseSubject::whereHas('course_subject',function($row) use ($curriculum, $course, $subject) { 
            return $row->where([
                ['course_id', '=', $course->id],
                ['subject_id', '=', $subject->id]
            ])->whereHas('subject', function($row) use ($curriculum) { 
                if(!is_null($curriculum)) { 
                    return $row->where('curriculum_id', $curriculum->id);
                }
            });
        })->get();

        DB::beginTransaction();

        try{ 
            foreach( $scs as $schedule) { 
         
                $sr = new ScheduleRoom;
                $sr->schedule_course_subject_id = $schedule->id;
                $sr->room_id = $validated['room'];
                $sr->save(); 
            }
        }catch(\Exception $e) { 
            DB::rollback();

            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'Something went wrong'. $e,
            ]);
        }

        DB::commit();
        
        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Schedule assigned to room successfully',
        ]);

    
    }
}
