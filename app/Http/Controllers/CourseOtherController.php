<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

//Models
use App\Models\CourseOther;
use App\Models\Course;
use App\Models\SchoolYear;
use App\Models\Enrollment;
use App\Models\Other;

//Others
use Yajra\DataTables\DataTables;

//Requests
use App\Http\Requests\CourseOther\StoreCourseOtherRequest;

class CourseOtherController extends Controller
{
    public function index(Request $request) { 

        if($request->ajax()){ 

            $school_year = null;
            $year = 1;
            $semester = 1; 
            
            if(!is_null($request->query('semester'))) { 
                $semester = $request->query('semester');
            }

            if(!is_null($request->query('year'))) { 
                $year = $request->query('year');
            }

            $others = CourseOther::where([
                ['status', '=', 1], 
                ['semester', '=', $semester], 
                ['year', '=', $year ]
            ])->get(); 

            return DataTables::of($others)
                ->addColumn('course', function($row) { 
                    return $row->course->course_name;
                })
                ->addColumn('amount', function($row){
                    return '₱ '.$row->other_item->sum('price') / 100;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('other.item.index', ['other' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('other.index');
    }

    public function create() { 
        $courses = Course::get();
        
        return view('other.create', compact('courses'));
    }

     public function store(StoreCourseOtherRequest $request) { 
        $validated = $request->validated();

        $payload = [
            ['course_id', '=', $validated['course_id']], 
            ['year', '=',  $validated['year_level']],
            ['semester', '=', $validated['semester']],
            ['status', '=', true]
        ];
        
        $course = CourseOther::where($payload)->first();
        
        if(!is_null($course)) { 
            return redirect()->route('course.item.index', ['other' => $course->id]);
        }else{ 

            DB::beginTransaction();

            try { 
                CourseOther::where($payload)->update([
                    'status' => false
                ]);

                $course = new CourseOther();
                $course->course_id = $validated['course_id']; 
                $course->year = $validated['year_level'];
                $course->semester = $validated['semester']; 
                $course->status = true;
                $course->save();
                
            }catch (\Exception $e) { 
                DB::rollback();

                return back()->with('status', [
                    'success' => false, 
                    'message' => 'Error', 
                    'description' => 'Something went wrong'
                ]);
            }

            DB::commit();

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Other Fee draft added',
            ]);

        }
    }
}
