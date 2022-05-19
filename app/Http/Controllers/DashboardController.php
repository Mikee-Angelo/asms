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
use App\Models\Miscellaneous;
use App\Models\Other;


//Others
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index(Request $request){ 
        $students = Student::get(); 

        if(Auth::user()->hasRole('Student')) { 
            $application = Auth::user()->student->application->last() ;
            $subjects = $application->application_subject;
            
            if($request->ajax()){  

                return DataTables::of($subjects)
                    ->addColumn('subject_code', function($row) { 
                        return $row->subject->subject_code;
                    })
                    ->addColumn('description', function($row) { 
                        return $row->subject->description;
                    })
                    ->addColumn('leclab', function($row) { 
                        return $row->subject->lec. ' / ' . $row->subject->lab;
                    })
                    ->addColumn('day', function($row) { 
                        $course_subjects = $row->subject->course_subject;
                        $schedule = null;

                        foreach($course_subjects as $course_subject) { 
                            
                            $day = $course_subject->schedule_course_subject->pluck('day');

                            if(in_array('Monday', $day->toArray()) && in_array('Wednesday', $day->toArray())) {
                                $schedule = 'MW';
                            } elseif(in_array('Tuesday', $day->toArray()) && in_array('Thursday', $day->toArray())) {
                                $schedule = 'TTH';
                            } elseif(in_array('Friday', $day->toArray())) { 
                                $schedule = 'FRI';
                            } elseif(in_array('Saturday', $day->toArray())) { 
                                $schedule = 'SAT';
                            } 
                        }

                        return $schedule ?? 'N/A';
                    })
                    ->addColumn('faculty', function($row) { 
                        $course_subjects = $row->subject->course_subject->first();
                        $faculty = $course_subjects->schedule_course_subject->first();

                        return $faculty->faculty->name ?? 'N/A';
                    })
                     ->addColumn('time', function($row) { 
                        $course_subjects = $row->subject->course_subject;
                        $schedule = null;

                        foreach($course_subjects as $course_subject) { 
                            $time = $course_subject->schedule_course_subject->unique('starts_at')->first();
                            
                            if(!is_null($time) && (!is_null($time->starts_at) && !is_null($time->ends_at))) { 
                                $schedule = Carbon::parse( $time->starts_at)->format('g:i A'). ' - '. Carbon::parse($time->ends_at)->format('g:i A');
                            }
                        }

                        return $schedule ?? 'N/A';
                    })
                    ->addColumn('day', function($row) { 
                        $course_subjects = $row->subject->course_subject;
                        $schedule = null;

                        foreach($course_subjects as $course_subject) { 
                            $day = $course_subject->schedule_course_subject->pluck('day');
                            
                            if(in_array('Monday', $day->toArray()) && in_array('Wednesday', $day->toArray())) {
                                $schedule = 'MW';
                            } elseif(in_array('Tuesday', $day->toArray()) && in_array('Thursday', $day->toArray())) {
                                $schedule = 'TTH';
                            } elseif(in_array('Friday', $day->toArray())) { 
                                $schedule = 'FRI';
                            } elseif(in_array('Saturday', $day->toArray())) { 
                                $schedule = 'SAT';
                            } 
                        }

                        return $schedule ?? 'N/A';
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
            $miscellaneous  = Miscellaneous::get();
            $other = Other::get();
            $transaction = $application->application_transaction->where('paid', 1)->sum('amount') / 100;

            $miscellaneous_total = count($miscellaneous) == 0 ? 0 :  $miscellaneous->sum('price') / 100;
            $other_total = count($other) == 0 ? 0 :  $other->sum('price') / 100;
            $course_total = 0;

            $total_units = 0;
            $total_grades = 0;
            
            foreach($subjects as $subject) { 
                $pricing = $subject->application->course->pricing->where('id', $application->semester_id)->first();
                $lec_price = $pricing->lec_price / 100; 
                $lab_price = $pricing->lab_price / 100;
                $lec = $subject->subject->lec;
                $lab = $subject->subject->lab; 

                $total_grades += ($lec + $lab) * $subject->final;
                $total_units += $lec + $lab;
                $course_total += ($lec_price * $lec) + ($lab_price * $lab);

            }
            
            if($total_grades > 0) { 
                $gwa = ($total_grades / $total_units) / 100;
            }else{ 
                $gwa = 0;
            }
            
            $discount = is_null($application->discount) ? 0 : ($application->discount->discount / 100);
            $payable = $other_total + $miscellaneous_total + $course_total;
            $discounted = $course_total * $discount;
            $total = ($payable - $transaction) - $discounted;

            return view('student.dashboard.index', compact('student', 'gwa', 'total', 'application'));
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
