<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    public function pricing() { 
        return $this->hasMany('App\Models\Pricing', 'id');
    }

    public function school_year(){ 
        return $this->belongsTo('App\Models\SchoolYear');
    }
}
