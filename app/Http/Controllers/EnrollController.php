<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model
use App\Models\Course; 


class EnrollController extends Controller
{
    //
    public function index() { 
        $courses = Course::get();

        return view('enroll', compact('courses'));
    }
}
