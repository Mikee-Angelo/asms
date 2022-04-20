<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Facades
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\Application; 
use App\Models\Student; 
use App\Models\User;
use App\Models\Curriculum;

//Others
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index(Request $request){ 
        $students = Student::get(); 

        if(Auth::user()->hasRole('Student')) { 
            $subjects = Auth::user()->student->application->last()->application_subject ;
            
            if($request->ajax()){  

                return DataTables::of($subjects)
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
                    ->addColumn('prelim', function($row) { 
                        if(is_null($row->prelim)) return 'N/A';

                        return ($row->prelim / 100) ;
                    })
                     ->addColumn('midterm', function($row) { 
                        if(is_null($row->midterm)) return 'N/A';

                        return $row->midterm / 100;
                    })
                     ->addColumn('prefinal', function($row) { 
                        if(is_null($row->prefinal)) return 'N/A';

                        return $row->prefinal / 100;
                    })
                     ->addColumn('final', function($row) { 
                        if(is_null($row->final)) return 'N/A';

                        return $row->final / 100;
                    })
                    ->make(true);
            }

            $student = Auth::user()->student;

            $total_units = 0;
            $total_grades = 0;
            
            foreach($subjects as $subject) { 
                $lec = $subject->subject->lec;
                $lab = $subject->subject->lab; 

                $total_grades += ($lec + $lab) * $subject->final;

                $total_units += $lec + $lab;
            }
            
            if($total_grades > 0) { 
                $gwa = ($total_grades / $total_units) / 100;
            }else{ 
                $gwa = 0;
            }

            return view('student.dashboard.index', compact('student', 'gwa'));
        }

        if(Auth::user()->hasRole('Instructor')) { 

            return view('faculty.dashboard.instructor');
        }

        $now = Carbon::now();
        
        //Get total number of student
        $total_number_of_student = Student::count();

        //Get total number of accepted application this year
        $active_student = Application::whereYear('created_at', $now->year)->where('status', 'accepted')->count();

        //Fetch total number of faculty 
        $number_of_faculty = User::doesntHave('Student')->count();

        return view('dashboard',compact('total_number_of_student', 'active_student', 'number_of_faculty'));
    }
}
