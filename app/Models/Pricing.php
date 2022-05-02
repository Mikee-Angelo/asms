<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;

    public function course() { 
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function semester(){ 
        return $this->belongsTo('App\Models\Enrollment');
    }
}
