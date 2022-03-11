<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Student; 
use App\Models\Application; 

//Requests
use App\Http\Requests\Application\StoreApplicationRequest; 

//Facades
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

//Others
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    //
    public function index(Request $request) {

        $datas = Application::with(['student', 'course'])->get(); 

        if($request->ajax()){ 
            return DataTables::of($datas)
                    ->addColumn('course', function($data) { 
                        return $data->course->course_name;
                    })
                    ->addColumn('last_name', function($data) { 
                
                        return $data->student->last_name;
                    })
                    ->addColumn('first_name', function($data) { 
                        return $data->student->given_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('application.show', ['application' => $row->id ]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('application.index');
     }

     public function show(Application $application) {
        return view('application.show', compact('application'));
     }

    public function store(StoreApplicationRequest $request) {
        $validated = $request->validated(); 

        DB::transaction(function () use ($validated) {
            
            $student = Student::create([
                'last_name' => $validated['last_name'],
                'given_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'birthday' => $validated['birthday'],
                'mobile_no' => $validated['mobile_no'],
                'gender' => $validated['gender'],
                'register_email' => $validated['register_email'],
                'facebook_link' => $validated['facebook_link'],
                'home_address' => $validated['home_address'],
                'present_address' => $validated['present_address'],
                'mother' => $validated['mother'],
                'mother_occupation' => $validated['mother_occupation'],
                'father' => $validated['father'],
                'father_occupation' => $validated['father_occupation'],
                'guardian' => $validated['guardian'],
                'guardian_contact_no' => $validated['guardian_contact_no'],
                'guardian_relationship' => $validated['guardian_relationship'],
                'primary_school' => $validated['primary_school'],
                'primary_graduated' =>$validated['primary_graduated'],
                'secondary_school' => $validated['secondary_school'],
                'secondary_graduated' =>$validated['secondary_graduated'],
                'senior_school_name' => $validated['senior_school_name'],
                'strand' => $validated['strand'],
                'senior_graduated' => $validated['senior_graduated'],
                'tertiary_school' => $validated['tertiary_school'],
                'tertiary_graduated' => $validated['tertiary_graduated'],
                'last_school_date' => $validated['last_school_date'],
                'status' => 1,
            ]);


            $application = Application::create([
                'ticket_no' => Str::uuid()->toString(),
                'student_id' => $student->id,
                'course_id' => $validated['course_id'],
                'year_level' => $validated['year_level'],
                'semester' => 1, 
                'application_type' => $validated['application_type'],
                'mental_illness' => $validated['mental_illness'],
                'hearing_defects' => $validated['hearing_defects'],
                'physical_disability' => $validated['physical_disability'],
                'chronic_illness' => $validated['chronic_illness'],
                'interfering_illness' => $validated['interfering_illness'],
                'allergies' => $validated['allergies'],
 
            ]);
        });

        return redirect('enroll')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Please check your email. We send a ticket to you',
        ]);

            
    }
}
