<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDean extends Model
{
    use HasFactory;

    public function user() { 
        return $this->belongsTo('App\Models\User', 'faculty_id');
    }

    public function course(){ 
        return $this->belongsTo('App\Models\Course', 'course_id');
    }
}
