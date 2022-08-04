<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Others
use Yajra\DataTables\DataTables;

//Models
use App\Models\Building; 

//Requests
use App\Http\Requests\Building\StoreBuildingRequest;

class BuildingController extends Controller
{
    //
    public function index(Request $request) { 

        if($request->ajax()){ 
            $buildings = Building::get(); 
            return DataTables::of($buildings)
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('building.show', ['building' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('building.index');
    }

    public function create() { 
        return view('building.create');
    }

    public function store(StoreBuildingRequest $request) { 
        $validated = $request->validated();
        
        $building = new Building;
        $building->name = $validated['name']; 
        $building->address = $validated['address'];
        $building->no_of_floors = $validated['no_of_floors'];
        $building->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Building successfully added',
        ]);
    }

    public function show(Building $building) { 
    
        return view('building.show', compact('building'));
    }
}
