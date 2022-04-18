<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
//Models
use App\Models\SchoolYear;

//Others
use Yajra\DataTables\DataTables;

//Requests
use App\Http\Requests\SchoolYear\StoreSchoolYearRequest;


class SchoolYearController extends Controller
{
    //
    public function index(Request $request) {

        if($request->ajax()){ 
            $years = SchoolYear::get(); 

            return DataTables::of($years)
                    ->addColumn('academic_year', function($row){
                        return $row->year_start. ' - '. $row->year_ends;
                    }) 
                    ->addColumn('starts_at', function($row){
                        return Carbon::parse($row->starts_at)->format('F d, Y').(is_null($row->ends_at) ? '' : ' - '. Carbon::parse($row->ends_at)->format('F d, Y'));
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('school-year.show', ['school_year' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('school-year.index');
    }

    public function create() { 

        $y = range(2002, Carbon::now()->year );
        $years = array_reverse($y);

        return view('school-year.create', compact('years'));
    }

    public function store(StoreSchoolYearRequest $request) {
        $validated = $request->validated();

        $sy = new SchoolYear; 
        $sy->user_id = Auth::id();
        $sy->year_start = $validated['school_year']; 
        $sy->year_ends = $validated['school_year'] + 1; 
        $sy->starts_at = $validated['starts_at']; 
        $sy->ends_at = $validated['ends_at']; 
        $sy->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'School Year successfully added',
        ]);
    }
}
