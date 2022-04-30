<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Miscellaneous;
use App\Models\SchoolYear;
use App\Models\Enrollment;

//Others
use Yajra\DataTables\DataTables;

//Facades
use Illuminate\Support\Facades\Auth;

//Request
use App\Http\Requests\Miscellaneous\StoreMiscellaneousRequest;

class MiscellaneousController extends Controller
{
    //
    public function index(Request $request) { 
        if($request->ajax()){ 

            $miscellaneous = Miscellaneous::get(); 

            return DataTables::of($miscellaneous)
                    ->addColumn('price', function($row){
                        return '₱ '.$row->price / 100;
                    })
                    ->make(true);
        }
        return view('miscellaneous.index');
    }

    public function create() {
        return view('miscellaneous.create');
    }

    public function store(StoreMiscellaneousRequest $request) { 
        $validated = $request->validated(); 

        $school_year = SchoolYear::orderBy('id', 'DESC')->first();

        if(is_null($school_year)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'School Year was not found. Please contact the administrator',
            ]);
        }

        $semester = Enrollment::where('school_year_id', $school_year->id)->orderBy('id', 'DESC')->first();

        if(is_null($semester)) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'No Semester schedule yet. Please contact the administrator',
            ]);
        }

        $str_lower = strtolower($validated['name']);
        $cooked = str_replace(' ', '-', $str_lower);

        $miscellaneous = new Miscellaneous;
        $miscellaneous->semester_id = $semester->id;
        $miscellaneous->user_id = Auth::id();
        $miscellaneous->tag = $cooked;
        $miscellaneous->name = $validated['name'];
        $miscellaneous->price = $validated['price'] * 100;

        $miscellaneous->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Miscellaneous successfully added',
        ]);
    }
}
