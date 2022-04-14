<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
//Models
use App\Models\Schedule;

//Others
use Yajra\DataTables\DataTables;

//Request
use App\Http\Requests\Schedule\StoreScheduleRequest; 

class ScheduleController extends Controller
{
    //
    public function index(Request $request) { 

        if($request->ajax()){ 
            $schedules = Schedule::get(); 

            return DataTables::of($schedule)
                    ->addColumn('action', function($row){
                        
                        $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('schedule.index');
    }

    public function show() { 
        return view('schedule.show');
    }

    public function create(Request $request) {
        if($request->ajax()){ 
            $schedules = Schedule::where('sender_id', Auth::id())->get(); 

            return DataTables::of($schedules)
                    ->addColumn('starts_at', function($row){ 
                        return Carbon::parse($row->starts_at)->format('g:i A');
                    })
                     ->addColumn('ends_at', function($row){ 
                        return Carbon::parse($row->ends_at)->format('g:i A');
                    })
                    ->addColumn('action', function($row){
                        $btn = '';
                        if($row->status == 'draft') {
                            $btn = '<button class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Delete</button>';

                        }else{ 
                            $btn = '<button class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" disabled>Delete</button>';
                        
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

        return view('schedule.create', compact('days'));
    }

    public function store(StoreScheduleRequest $request) {
 
        $validated = $request->validated();

        
        foreach($validated['days'] as $day) { 

            $schedule = new Schedule;
            $schedule->day = $day;
            $schedule->sender_id = Auth::id();
            $schedule->receiver_id = Auth::user()->course_instructor->course->course_dean->user->id;
            $schedule->starts_at = $validated['starts_at'];
            $schedule->ends_at = $validated['ends_at'];

            $schedule->save();
        }

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Schedule successfully added',
        ]);
    }

    public function submit(Request $request) { 
        if($request->ajax()) { 
            Schedule::where([
                ['status', '=', 'draft'],
                ['sender_id', '=', Auth::id()],
            ])->update([
                'status' => 'pending'
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Schedule successfully submitted',
            ]);
        }
    }

}

