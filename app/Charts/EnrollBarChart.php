<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Carbon\Carbon;

//Models
use App\Models\Student;
use App\Models\Application;

class EnrollBarChart extends BaseChart
{

    public ?string $name = 'enroll_bar_chart';

    public ?string $routeName = 'enroll_bar_chart';
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        
        $students = Student::get();

        $years = [];
        $counts = [];

        foreach ($students as $student) {
            $time = $student->application->last()->where('status', 'accepted')->pluck('created_at')->first();
            $date = new Carbon( $time );   

            $collection = collect($date->year);
            array_push($years, $collection->unique());
        }

        foreach($years as $year) { 

            $count =  Application::whereYear('created_at', $year)->where('status', 'accepted')->count();

            array_push($counts, $count);
    
        }

        return Chartisan::build()
            ->labels($years)
            ->dataset('Sample', $counts);
    }
}