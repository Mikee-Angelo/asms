<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\ApplicationSubject;
use App\Models\Application;
use App\Models\CourseSubject;
use App\Models\Subject;

//Requests
use App\Http\Requests\ApplicationSubject\StoreApplicationSubjectRequest;

//Others
use Yajra\DataTables\DataTables;

class ApplicationSubjectController extends Controller
{
    //
    public function index(Application $application, Request $request){ 
        
        if($request->ajax()){ 
            $year = $application->year_level;
            $semester = $application->semester; 
            
            if(!is_null($request->query('semester'))) { 
                $semester = $request->query('semester');
            }

            if(!is_null($request->query('year'))) { 
                $year = $request->query('year');
            }

            $datas = ApplicationSubject::with(['application', 'subject'])->where('application_id', $application->id)->get(); 
            $ids = $datas->pluck('subject_id')->toArray();

            $suggested = null ;
        
            if($request->has('suggested')) { 
                $subjects = CourseSubject::where([
                    [ 'course_id', '=', $application->course_id],
                    [ 'year', '=', $year],
                    [ 'semester', '=', $semester],
                ])->whereNotIn('subject_id', $ids)->get();

                return DataTables::of($subjects)
                    ->addColumn('subject_code', function($row){ 
                        return $row->subject->description;
                    }) 
                    ->addColumn('description', function($row){ 
                        return $row->subject->description;
                    }) 
                    ->addColumn('leclab', function($row){ 
                        return $row->subject->lec.' / '.$row->subject->lab;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button type="button"  data-remote="'.$row->subject_id.'" class="as-add-btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Add</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true); 
            }

        
            return DataTables::of($datas)
                ->addColumn('subject', function($row){ 
                    return $row->subject->description;
                }) 
                ->addColumn('leclab', function($row){ 
                    return $row->subject->lec.' / '.$row->subject->lab;
                })
                ->addColumn('pricing', function($row){ 
                    if(Auth::user()->hasRole('Accounting Head')) { 

                        $pricing = $row->application->course->pricing;

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
                        $btn = '<button data-remote="'.$row->subject_id.'" class="as-del-btn inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">Remove</button>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('application-subject.index');
    }

    public function store(Application $application, StoreApplicationSubjectRequest $request) {
        
        if($request->ajax()) { 

            try { 
                $validated = $request->validated();

                $application_subject = new ApplicationSubject; 
                $application_subject->application_id = $application->id; 
                $application_subject->subject_id = $validated['subject_id'];
            $application_subject->save(); 

                return response()->json([
                    'status' => true,
                    'message' => 'Subject added successfully',
                ]);

            }catch(\Exception $e) { 

                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong',
                ]);

            }
        }
    }

    public function destroy(Application $application, Subject $subject, Request $request) { 

        if($request->ajax()) { 
            try { 
                $application_subject = ApplicationSubject::where([
                    ['application_id', '=', $application->id],
                    ['subject_id', '=', $subject->id]
                ])->delete();

                if($application_subject == 0) { 
                    return response()->json([
                        'status' => false,
                        'message' => 'Subject already deleted',
                    ]);
                }
                
                return response()->json([
                    'status' => true,
                    'message' => 'Subject deleted successfully',
                ]);
            }catch (\Exception $e) { 
                return response()->json([
                    'status' => false,
                    'message' => 'Something went wrong',
                ]);
            }
        }
        
       
    }
}
