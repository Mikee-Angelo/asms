<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseOther extends Model
{
    use HasFactory;
    
    public function course() { 
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function other_item() { 
        return $this->hasMany('App\Models\Other', 'course_other_id');
    }
    
    public function application() { 
        return $this->hasMany('App\Models\Application', 'course_other_id');
    }
}
