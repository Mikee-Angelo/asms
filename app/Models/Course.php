<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function pricing() { 
        return $this->hasOne('App\Models\Pricing', 'course_id');
    }

    public function application() {
        return $this->hasMany('App\Models\Application', 'course_id');
    }

    public function course_dean(){ 
        return $this->hasOne('App\Models\CourseDean', 'course_id');
    }
}
