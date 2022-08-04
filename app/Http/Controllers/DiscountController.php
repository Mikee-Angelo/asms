<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\Discount;
use App\Models\SchoolYear;
use App\Models\Enrollment;

//Request
use App\Http\Requests\Discount\StoreDiscountRequest;

//Facades
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    //
    public function index(Request $request) { 

         if($request->ajax()){
            $discounts = Discount::get();

            return DataTables::of($discounts)
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('discount.show', ['discount' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
         }
        return view('discount.index');
    }

    public function create() { 
        return view('discount.create');
    }

    public function store(StoreDiscountRequest $request) { 
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

        $discount = new Discount; 
        $discount->semester_id = $semester->id;
        $discount->user_id = Auth::id();
        $discount->name = $validated['name'];
        $discount->discount = $validated['discount'];
        $discount->description = $validated['description'];

        $discount->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Discount successfully added',
        ]);
    }
}
