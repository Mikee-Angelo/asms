<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'semester_id',
        'course_miscellaneous_id',
        'course_other_id',
        'ticket_no',
        'student_id',
        'course_id',
        'year_level',
        'application_type',
        'mental_illness',
        'hearing_defects',
        'physical_disability',
        'chronic_illness',
        'interfering_illness',
        'allergies',
        'accepted_at',
        'enrolled_at',
        'rejected_at'
    ];

    public function student() { 
        return $this->belongsTo('App\Models\Student', 'student_id', 'id');
    }

    public function course() {
        return $this->belongsTo('App\Models\Course', 'course_id', 'id');
    }

    public function application_subject() { 
        return $this->hasMany('App\Models\ApplicationSubject', 'application_id');
    }

    public function application_transaction() { 
        return $this->hasMany('App\Models\ApplicationTransaction', 'application_id');
    }

    public function school_year() { 
        return $this->belongsTo('App\Models\SchoolYear', 'school_year_id'); 
    }

    public function discount() { 
        return $this->belongsTo('App\Models\Discount', 'discount_id');
    }

    public function fees() { 
        return $this->hasOne('App\Models\Miscellaneous', 'course_miscellaneous_id');
    }

    public function course_other() { 
        return $this->belongsTo('App\Models\CourseOther', 'course_other_id');
    }
}
