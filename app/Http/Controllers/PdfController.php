<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use setasign\Fpdi\Fpdi;

//Models 
use App\Models\User;
use App\Models\Student;
use App\Models\Application;

class PdfController extends Controller
{
    //

    public function show(String $id) { 
        $application = Application::findOrFail($id);

        $outputFile = Storage::disk('local')->path('output.pdf');
        $file = Storage::disk('local')->path('reg-form.pdf');
        $fpdi = new FPDI;
        $count = $fpdi->setSourceFile($file);

        for($x = 1; $x < $count + 1; ++$x) { 
            $template = $fpdi->importPage($x);
            $size  = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $fpdi->SetFont("helvetica", "", 10);

            if($x == 1) { 
                for($y = 1; $y < 3; ++$y) { 
                    //Name
                    $left = 15;
                    $top = $y == 1 ? 24 : 192.5;
                    $name = $application->student->last_name.', '.$application->student->given_name.' '.$application->student->middle_name;

                    $fpdi->Text($left,$top,$name);

                    //Student Number
                    $left = 140;
                    $top = $y == 1 ? 24 : 192.5;
                    $student_number = $application->student->student_number;

                    $fpdi->Text($left,$top, $student_number);

                    //Course
                    $left = 15;
                    $top = $y == 1 ? 30 : 199;
                    $course = $application->course->course_name;
                    $fpdi->Text($left,$top, $course);

                    //Year Level
                    $left = 130;
                    $top = $y == 1 ? 30 : 199;
                    $year_level = $application->year_level;
                    $fpdi->Text($left,$top, $year_level);

                    //Semester
                    $left = $application->semester == 1 ? 155 : 162;
                    $top = $y == 1 ?  28 : 197;
                    $semester = '/';
                    $fpdi->Text($left,$top, $semester);

                    //School Year

                    //Start
                    $left = 189.9;
                    $top = $y == 1 ?  28 : 197.5;
                    $semester_start = substr($application->school_year->year_start, -2);
                    $fpdi->Text($left,$top, $semester_start);     
                    
                    //Stop
                    $left = 197.5;
                    $top =  $y == 1 ?  28 : 197.5;
                    $semester_end = substr($application->school_year->year_ends, -2);
                    $fpdi->Text($left,$top, $semester_end);

                    //Email Address
                    $left = 15;
                    $top = $y == 1 ?  37 : 206;
                    $email = $application->student->register_email;
                    $fpdi->Text($left,$top, $email);     

                    //Mobile Number
                    $left = 100;
                    $top = $y == 1 ?  37 : 206;
                    $mobile_no = $application->student->mobile_no;
                    $fpdi->Text($left,$top, $mobile_no); 

                    //Subjects
                    $subjects = $application->application_subject; 

                    foreach($subjects as $k => $subject){ 

                        $subject = $subject->subject;
                        $top = ($k * 4.25) + ( $y == 1 ? 51 : 220);

                        //Subject Code
                        $left = 15;
                        $top = $top;
                        $subject_code = $subject->subject_code;
                        $fpdi->Text($left,$top, $subject_code); 

                        //Description
                        $left = 35;
                        $top = $top;
                        $description = $subject->description;
                        $fpdi->Text($left,$top, $description);
                        
                        //Lec
                        $left = 130;
                        $top = $top;
                        $lec = $subject->lec;
                        $fpdi->Text($left,$top, $lec);

                        //Lab
                        $left = 141;
                        $top = $top;
                        $lab = $subject->lab;
                        $fpdi->Text($left,$top, $lab);
                    }
                }
            }

        }

        return response()->file($fpdi->Output());
    }
}
