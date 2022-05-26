<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Models
use App\Models\CourseMiscellaneous;

//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\Course;
use App\Models\Curriculum;

//Requests
use App\Http\Requests\CourseMiscellaneous\StoreCourseMiscellaneousRequest;


class CourseMiscellaneousController extends Controller
{
    //
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

            $course_miscellaneous = CourseMiscellaneous::where([
                ['status', '=', 1], 
                ['semester', '=', $semester], 
                ['year', '=', $year ]
            ])->get(); 

            return DataTables::of($course_miscellaneous)
                    ->addColumn('course_id', function($row) { 
                        return $row->course->course_name;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('miscellaneous.item.index', ['miscellaneou' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">View</a>';
                        return $btn;
                    })
                    ->addColumn('amount', function($row){
                        return '₱ '.$row->fees->sum('price') / 100;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('miscellaneous.index');
    }

    public function create() {
        $courses = Course::get(); 

        return view('miscellaneous.create', compact('courses'));
    }

    public function store(StoreCourseMiscellaneousRequest $request) { 
        $validated = $request->validated();

        $course = CourseMiscellaneous::where([
            ['course_id', '=', $validated['course_id']], 
            ['year', '=',  $validated['year_level']],
            ['semester', '=', $validated['semester']],
            ['status', '=', true]
        ])->first();
        
        if(!is_null($course)) { 
            return redirect()->route('miscelleneous.item.index', ['miscellaneous' => $course->id]);
        }else{ 

            DB::beginTransaction();

            try { 
                CourseMiscellaneous::where([
                    ['course_id', '=', $validated['course_id']], 
                    ['year', '=',  $validated['year_level']],
                    ['semester', '=', $validated['semester']],
                    ['status', '=', true]
                ])->update([
                    'status' => false,
                ]);

                $course = new CourseMiscellaneous();
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
                'description' => 'Application accepted',
            ]);

        }
    }
}
