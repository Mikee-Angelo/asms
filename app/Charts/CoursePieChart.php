<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Carbon\Carbon;

//Models
use App\Models\Course; 
use App\Models\Student;

class CoursePieChart extends BaseChart
{
    public ?string $name = 'course_chart';

    public ?string $routeName = 'course_chart';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {   
        $students = Student::get();
        $count = []; 

        $courses = Course::get();
        
        /**
         * Possible issue:
         * If the user has multiple enrollment application
         */
        foreach ($courses as $course) {
            array_push($count,$course->application->where('status', 'accepted')->count());
        }

        return Chartisan::build()
            ->labels($courses->pluck('course_name')->toArray())
            ->dataset('Sample', $count);
    }
}