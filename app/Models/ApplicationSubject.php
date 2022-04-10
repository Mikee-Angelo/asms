<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationSubject extends Model
{
    use HasFactory;

    public function application() {
        return $this->belongsTo('App\Models\Application', 'application_id');
    }

    public function subject() {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }
}
