<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMiscellaneous extends Model
{
    use HasFactory;

    public function fees() { 
        return $this->hasMany('App\Models\Miscellaneous', 'course_miscellaneous_id');
    }

    public function course() { 
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function application() { 
        return $this->hasMany('App\Models\Application', 'course_miscellaneous_id');
    }
}
