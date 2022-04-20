<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function application_subject() { 
        return $this->hasOne('App\Models\ApplicationSubject', 'subject_id');
    }
}
