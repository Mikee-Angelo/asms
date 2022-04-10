<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Facades
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Application; 

//Others
use Yajra\DataTables\DataTables;


class DashboardController extends Controller
{
    //
    public function index(Request $request){ 
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

        return view('dashboard');
    }
}
