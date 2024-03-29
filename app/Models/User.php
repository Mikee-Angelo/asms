<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function student() { 
        return $this->hasOne('App\Models\Student', 'user_id');
    }

    public function course_dean() { 
        return $this->hasMany('App\Models\CourseDean', 'faculty_id');
    }

    public function course_instructor() { 
        return $this->hasOne('App\Models\CourseInstructor', 'faculty_id');
    }

    public function schedule() { 
        return $this->hasMany('App\Models\Schedule', 'sender_id');
    }

}
