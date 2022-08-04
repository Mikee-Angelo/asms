<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Room;
use App\Models\Building;

//Others
use Yajra\DataTables\DataTables;

//Requests
use App\Http\Requests\Room\StoreRoomRequest;

class RoomController extends Controller
{
    //
    public function index(Request $request) {

        if($request->ajax()){ 

            $rooms = Room::with('building')->get(); 

            return DataTables::of($rooms)
                    ->addColumn('building', function($row){
                        return $row->building->name;
                    })
                    ->addColumn('type', function($row) { 
                        return ucfirst($row->type);
                    })
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('building.show', ['building' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('rooms.index');
    }

    public function create(Building $building) { 

        $rooms = ['lecture' => 'Lecture', 'laboratory' => 'Laboratory'];
        $floors = range(1, $building->no_of_floors );
        
        return view('rooms.create', compact('rooms', 'floors')); 
    }

    public function store(Building $building, StoreRoomRequest $request) { 
        $validated = $request->validated(); 

        $room = new Room;
        $room->building_id = $building->id; 
        $room->name = $validated['name'];
        $room->type = $validated['type'];
        $room->floor = $validated['floor']; 
        $room->capacity = $validated['capacity'];
        $room->status = true;
        $room->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Room successfully added',
        ]);
    }
}
