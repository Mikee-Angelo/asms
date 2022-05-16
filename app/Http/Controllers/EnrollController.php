<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

//Model
use App\Models\Course; 
use App\Models\Application; 
use App\Models\Student;
use App\Models\SchoolYear;
use App\Models\Enrollment;


class EnrollController extends Controller
{
    //
    public function index() { 
        $courses = Course::get();
        $school_year = SchoolYear::orderBy('id', 'DESC')->first();
        $is_ended = true;

        if(!is_null($school_year)) { 
            $enrollment = Enrollment::where([
                ['school_year_id', '=' ,$school_year->id],
                ['is_active', '=' , 1],
            ])->orderBy('id', 'DESC')->first();

            if(!is_null($enrollment)) {
                if(Carbon::now()->gt(Carbon::parse($enrollment->restricted_date))) { 
                    $is_ended = false;
                }
            }
        }

        return view('enroll.index', compact('courses', 'school_year', 'is_ended'));
    }
}
