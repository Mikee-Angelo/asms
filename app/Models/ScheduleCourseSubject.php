<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ScheduleCourseSubject extends Model
{
    use HasFactory;

    public function course_subject() {
        return $this->belongsTo('App\Models\CourseSubject', 'course_subject_id');
    }

    public function faculty() {
        return $this->belongsTo('App\Models\User', 'faculty_id');
    }

    public function schedule_room() {
        return $this->hasOne('App\Models\ScheduleRoom', 'schedule_course_subject_id');
    }
}
