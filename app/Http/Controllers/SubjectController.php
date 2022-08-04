<?php

namespace App\Http\Controllers;

//Illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\Subject; 
use App\Models\Curriculum; 
use App\Models\Course;
use App\Models\Student;
use App\Models\CourseSubject;
use App\Models\ScheduleCourseSubject;
//Request
use App\Http\Requests\AddSubjectRequest; 
use App\Http\Requests\Subjects\SearchSubjectRequest; 

class SubjectController extends Controller
{
    //
    public function index(Request $request) { 
        if($request->ajax()){ 

            $curriculum = Curriculum::where('is_default', 1)->first();
            
            if(Auth::user()->hasRole('Instructor')) { 
                $course_model = ScheduleCourseSubject::where('faculty_id', Auth::id())->whereHas('course_subject.subject', function($row) use ($curriculum) { 
                    return $row->where('curriculum_id', $curriculum->id);
                })->get();

                $subjects = collect($course_model)->unique('course_subject_id');

                return DataTables::of($subjects)
                    ->addColumn('subject_code', function($row) { 
                        return $row->course_subject->subject->subject_code;
                    })
                     ->addColumn('description', function($row) { 
                        return $row->course_subject->subject->description;
                    })
                    ->addColumn('lec', function($row) { 
                        return $row->course_subject->subject->lec;
                    })
                    ->addColumn('lab', function($row) { 
                        return $row->course_subject->subject->lab;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('subjects.show', ['subject' => $row->course_subject->subject->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                      
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            $subject = Subject::where('curriculum_id', $curriculum->id)->get(); 

            return DataTables::of($subject)
                    ->addColumn('action', function($row){
                        if(request()->routeIs('courses.subjects.index')) { 
                            $btn = '<a href="'.route('courses.subjects.index', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Add</a>';
                        }else{ 
                            $btn = '
                                <div class="flex flex-row">
                                    <a href="'.route('subjects.show', ['subject' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>
                                    <button type="button" data-remote="'.$row->id.'" class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-800 border border-transparent rounded-md del-btn hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25">Delete</button>
                                </div>
                            ';
                        }

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('subject.index');
    }

    public function show(Subject $subject, Request $request) { 

        if($request->ajax()){ 
            $students = Student::whereHas('application.application_subject' ,function($query) use ($subject) { 
                // dd($query);
                return $query->where('subject_id', $subject->id);
            })->whereNotNull('student_number')->get(); 

              
            return DataTables::of($students)
                    ->addColumn('name', function($row) use ($subject) { 
                        return $row->last_name.', '.$row->given_name;
                    })
                    ->addColumn('prelim', function($row) use ($subject) { 

                        if(!is_null($subject->application_subject->prelim)) { 
                            return $subject->application_subject->prelim / 100;
                        }

                        return 'N/A'; 
                    })
                    ->addColumn('midterm', function($row) use ($subject) { 
                         if(!is_null($subject->application_subject->midterm)) { 
                            return $subject->application_subject->midterm / 100;
                        }

                        return 'N/A';
                    })

                    ->addColumn('prefinal', function($row) use ($subject) { 
                         if(!is_null($subject->application_subject->prefinal)) { 
                            return $subject->application_subject->prefinal / 100;
                        }

                        return 'N/A'; 
                    })
                    ->addColumn('final', function($row) use ($subject) { 
                        if(!is_null($subject->application_subject->final)) { 
                            return $subject->application_subject->final / 100;
                        }

                        return 'N/A'; 
                    })
                    ->addColumn('action', function($row) use ($subject){
                        $btn = '<a href="'.route('subject.student.grades.create', ['subject' => $subject->id ,'student' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('subject.show', compact('subject'));
    }

    public function create() { 
        $courses = Course::select(['id', 'code', 'course_name'])->get();
        
        return view('subject.create', compact('courses'));
    }

    public function search(Subject $subject, SearchSubjectRequest $request) { 

        $validated = $request->validated();
        
        $subjects = Subject::select('subject_code', 'description')->where('subject_code', 'LIKE', '%'.$validated['subject_code'].'%')->get();

        return response()->json([
            'status' => true, 
            'data' => $subjects, 
        ]);
        
    }

    public function store(AddSubjectRequest $request) { 
        $validated = $request->validated(); 

        $curriculum = Curriculum::where('is_default', 1)->first();

        $subject = new Subject; 
        $subject->curriculum_id = $curriculum->id;
        $subject->course_id = $validated['course_id'];
        $subject->subject_code = $validated['subject_code']; 
        $subject->description = $validated['description']; 
        $subject->lec = is_null($validated['lec']) ? 0 : $validated['lec']; 
        $subject->lab = is_null($validated['lab']) ? 0 : $validated['lab']; 

        $subject->save();

        return redirect('subjects/create')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Subject successfully added',
        ]);
    }

    public function destroy(String $id){ 
        $subject = Subject::find($id); 

        try { 
            $subject->delete();

            return response()->json([
                'status' => true,
                'message' => 'Successfully Deleted',
            ]);

        }catch (Exception $e) { 
            return response()->json([
                'status' => false,
                'message' => e,
            ]);
        }
    }
}

