<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

//Models
use App\Models\Student; 
use App\Models\Application; 
use App\Models\ApplicationSubject; 
use App\Models\CourseSubject; 
use App\Models\Enrollment; 
use App\Models\User; 
use App\Models\Curriculum; 
use App\Models\Miscellaneous; 
use App\Models\Other; 
use App\Models\ApplicationTransaction; 

//Requests
use App\Http\Requests\Application\StoreApplicationRequest; 
use App\Http\Requests\Application\UpdateApplicationRequest;

//Facades
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

//Others
use Yajra\DataTables\DataTables;

//Mail
use App\Mail\ApplicationMail; 

class ApplicationController extends Controller
{
    //
    public function index(Request $request) {

        $pending = 'pending';

        if(Auth::user()->hasRole('Accounting Head')) { 
            $pending = 'accepted';
        }


        $datas = Application::with(['student', 'course'])->where('status' , $pending)->get(); 

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
                        $btn = '<a href="'.route('application.show', ['application' => $row->id ]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('application.index');
     }

     public function show(Application $application, Request $request) {
        $datas = ApplicationSubject::with(['application', 'subject'])->where('application_id', $application->id)->get(); 
        
        if($request->ajax()){ 
            
            return DataTables::of($datas)
                ->addColumn('subject', function($row){ 
                    return $row->subject->description;
                }) 
                ->addColumn('leclab', function($row){ 
                    return $row->subject->lec.' / '.$row->subject->lab;
                })
                ->addColumn('pricing', function($row) use ($application) { 
                    if(Auth::user()->hasRole('Accounting Head')) { 

                        $pricing = $row->application->course->pricing->where('id', $application->semester_id)->first();

                        if(is_null($pricing)) {
                            return 'N/A';
                        }

                        $lec_price = $pricing->lec_price / 100; 
                        $lab_price = $pricing->lab_price / 100;

                        $lec = $row->subject->lec;
                        $lab = $row->subject->lab;

                        return '₱ '.($lec_price * $lec) + ($lab_price * $lab);
                    }
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('application.show', ['application' => $row->id ]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        $total = 0;
        
        if(Auth::user()->hasRole('Accounting Head')) { 
            
            $miscellaneous  = Miscellaneous::get();
            $other = Other::get();
            $transaction = ApplicationTransaction::where('application_id', $application->id)->sum('amount') / 100;

            $miscellaneous_total = count($miscellaneous) == 0 ? 0 :  $miscellaneous->sum('price') / 100;
            $other_total = count($other) == 0 ? 0 :  $other->sum('price') / 100;
            $course_total = 0;

            foreach($datas as $data) { 
                $pricing = $data->application->course->pricing->where('id', $application->semester_id)->first();
                $lec_price = $pricing->lec_price / 100; 
                $lab_price = $pricing->lab_price / 100;
                $lec = $data->subject->lec;
                $lab = $data->subject->lab;
                
                $course_total += ($lec_price * $lec) + ($lab_price * $lab);
            }
            
            $discount = is_null($application->discount) ? 0 : ($application->discount->discount / 100);
            $payable = $other_total + $miscellaneous_total + $course_total;
            $discounted = $payable * $discount;
            $total = ($payable - $transaction) - $discounted;
            
        }
 
        return view('application.show', compact('application', 'total'));
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

            $enrollment = Enrollment::where('is_active', 1)->first();

            $application = Application::create([
                'semester_id' => $enrollment->id,
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

            $curriculum = Curriculum::where('is_default', 1)->first();

            $ids = CourseSubject::where([
                ['course_id', '=', $validated['course_id']],
                ['year', '=', $validated['year_level']],
                ['semester', '=', 1]
            ])->whereHas('subject', function($row) use ($curriculum) { 
                return $row->where('curriculum_id', $curriculum->id);
            })->pluck('subject_id');
            
            foreach($ids as $id){ 
                $as = new ApplicationSubject;
                $as->application_id = $application->id; 
                $as->subject_id = $id;

                $as->save();
            }
          
        });

        return redirect('enroll')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Please check your email. We send a ticket to you',
        ]);

            
    }

    public function accept(Application $application, UpdateApplicationRequest $request) { 
        $validated = $request->validated();

        if(($application->application_type == 1 || $application->application_type == 3) && (!$request->has('psa') || $validated['psa'] != 1)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Oops!', 
                'description' => 'Authenticated PSA Birth Certificate',
            ]);
        }

        $firstName = $application->student->given_name;
        $lastName = $application->student->last_name;
        $parsedLastName = str_replace(' ', '_', $lastName);
        $customEmail = strtolower( $firstName[0].$parsedLastName).'@subicbaycollege.com'; 
        $customPassword = Str::random(8);

        //Year Enrolled + Semester + Last ID Enrolled
        $now = \Carbon\Carbon::now();

        $studentCount = Student::count();

        DB::beginTransaction();

        try{ 
            $user = User::create([
                'name' => $firstName.' '.$lastName,
                'password' =>  bcrypt($customPassword),
                'email' => $customEmail,
            ]);

            Student::where('id', $application->student_id)->update([
                'psa' => $validated['psa'],
                'sf9' => $request->has('sf9') ? $validated['sf9'] : null,
                'good_moral' => $request->has('good_moral') ? $validated['good_moral'] : null,
                'colored_pictures' => $request->has('colored_pictures') ? $validated['colored_pictures'] : null,
                'honorable_dismissal' => $request->has('honorable_dismissal') ? $validated['honorable_dismissal'] : null,
                'transcript_records' => $request->has('transcript_records') ? $validated['transcript_records'] : null,
                'clearance' => $request->has('clearance') ? $validated['clearance'] : null,
                'user_id' =>  $user->id,
                'student_number' => $now->year.$application->semester.$studentCount
            ]);     
            
            Mail::to($application->student->register_email)->send(new ApplicationMail($user, $customPassword));

            Application::where([
                'id' => $application->id,
                'status' => 'pending',
            ])->update([
                'status' => 'accepted',
                'accepted_at' => Carbon::now(),
            ]);

            $user->assignRole('Student');

        }catch(\Exception $e){
            DB::rollback();

            return back()->with('status', [
                'success' => false, 
                'message' => 'Oops!', 
                'description' => 'Error '.$e,
            ]);

        }

        DB::commit();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Application accepted',
        ]);

    }
}
