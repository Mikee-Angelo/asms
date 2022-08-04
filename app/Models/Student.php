<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

      protected $fillable = [ 
        'last_name',
        'given_name',
        'middle_name',
        'birthday',
        'mobile_no',
        'gender', 
        'register_email',
        'facebook_link',
        'home_address',
        'present_address',
        'mother',
        'mother_occupation',
        'father',
        'father_occupation',
        'guardian',
        'guardian_contact_no',
        'guardian_relationship',
        'primary_school',
        'primary_graduated',
        'secondary_school', 
        'secondary_graduated',
        'senior_school_name',
        'strand',
        'senior_graduated',
        'tertiary_school',
        'tertiary_graduated',
        'last_school_date',
        'status',
    ];
    
    public function application() { 
      return $this->hasMany('App\Models\Application', 'student_id');
    }
}
