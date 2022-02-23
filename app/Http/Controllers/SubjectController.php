<?php

namespace App\Http\Controllers;

//Illuminate
use Illuminate\Http\Request;

//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\Subject; 
use App\Models\Course;

//Request
use App\Http\Requests\AddSubjectRequest; 

class SubjectController extends Controller
{
    //
    public function index(Request $request) { 
        $subject = Subject::get(); 

        if($request->ajax()){ 
            return DataTables::of($subject)
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('subjects.show', ['subject' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('subject.index');
    }

    public function create() { 
        $courses = Course::select(['id', 'code', 'course_name'])->get();
        

        return view('subject.create', compact('courses'));
    }

    public function store(AddSubjectRequest $request) { 
        $validated = $request->validated(); 

        $subject = new Subject; 
 
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
}

