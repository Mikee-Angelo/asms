<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Other;

//Request
use App\Http\Requests\Other\StoreOtherController;

//Facades
use Illuminate\Support\Facades\Auth;

//Others
use Yajra\DataTables\DataTables;

class OtherController extends Controller
{
    public function index(Request $request) { 

        if($request->ajax()){ 
            $others = Other::get();

            return DataTables::of($others)
                ->addColumn('price', function($row){
                    return '₱ '.$row->price / 100;
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('other.index');
    }

    public function create() {
        return view('other.create');
    }

    public function store(StoreOtherController $request) {
        $validated = $request->validated(); 

        $str_lower = strtolower($validated['name']);
        $cooked = str_replace(' ', '-', $str_lower);

        $other = new Other;
        $other->user_id = Auth::id();
        $other->tag = $cooked;
        $other->name = $validated['name'];
        $other->price = $validated['price'] * 100;

        $other->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Other Fee successfully added',
        ]);
    }
}
