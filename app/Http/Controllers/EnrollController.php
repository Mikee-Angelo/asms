<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Model
use App\Models\Course; 
use App\Models\Application; 
use App\Models\Student;


class EnrollController extends Controller
{
    //
    public function index() { 
        $courses = Course::has->get();
        return view('enroll.index', compact('courses'));
    }
}
