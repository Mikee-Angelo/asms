<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Miscellaneous;

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

        $str_lower = strtolower($validated['name']);
        $cooked = str_replace(' ', '-', $str_lower);

        $miscellaneous = new Miscellaneous;
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
