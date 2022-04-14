<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInstructor extends Model
{
    use HasFactory;

    public function faculty() { 
        return $this->belongsTo('App\Models\User', 'faculty_id');
    }
}
