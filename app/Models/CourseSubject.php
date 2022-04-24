<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSubject extends Model
{
    use HasFactory;

    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function subject() {
        return $this->belongsTo('App\Models\Subject', 'subject_id', 'id');
    }

    public function schedule_course_subject(){ 
        return $this->hasMany('App\Models\ScheduleCourseSubject', 'course_subject_id');
    }
}
