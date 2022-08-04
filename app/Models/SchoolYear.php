<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    public function enrollment() {
        return $this->hasMany('App\Models\Enrollment', 'school_year_id');
    }
}
