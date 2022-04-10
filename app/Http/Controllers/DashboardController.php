<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Facades
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Application; 
use App\Models\Student; 

//Others
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index(Request $request){ 
        $students = Student::get(); 

        if(Auth::user()->hasRole('Student')) { 
            if($request->ajax()){ 
               $subject = Auth::user()->student->application->last()->application_subject ;
            
                return DataTables::of($subject)
                    ->addColumn('subject_code', function($row) { 
                        return $row->subject->subject_code;
                    })
                    ->addColumn('description', function($row) { 
                        return $row->subject->description;
                    })
                    ->addColumn('lec', function($row) { 
                        return $row->subject->lec;
                    })
                    ->addColumn('lab', function($row) { 
                        return $row->subject->lab;
                    })
                    ->make(true);
            }

            $student = Auth::user()->student;

            return view('student.dashboard.index', compact('student'));
        }

        $now = Carbon::now();
        
        //Get total number of student
        $total_number_of_student = Student::count();

        //Get total number of accepted application this year
        $active_student = Application::whereYear('created_at', $now->year)->where('status', 'accepted')->count();

        return view('dashboard',compact('total_number_of_student', 'active_student'));
    }
}
