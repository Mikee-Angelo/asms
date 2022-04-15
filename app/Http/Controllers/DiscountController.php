<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\Discount;

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

        $discount = new Discount; 

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
