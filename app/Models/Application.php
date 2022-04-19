<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'school_year_id',
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
}
