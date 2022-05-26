<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Other;
use App\Models\SchoolYear;
use App\Models\Enrollment;
use App\Models\CourseOther;

//Request
use App\Http\Requests\OtherItem\StoreOtherItemRequest;

//Facades
use Illuminate\Support\Facades\Auth;

//Others
use Yajra\DataTables\DataTables;

class OtherController extends Controller
{
    public function index(CourseOther $other, Request $request) { 

        if($request->ajax()){ 

            return DataTables::of($other->other_item)
                ->addColumn('price', function($row){
                    return '₱ '.$row->price / 100;
                })
                ->addColumn('action', function($row) use ($other) {
                    return '
                        <a href="'.route('other.item.edit', ['other' => $other->id, 'item' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Edit</a>
                        <button type="button" data-remote="'.$row->id.'" class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-800 border border-transparent rounded-md del-btn hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25">Delete</button>
                    ';   
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('other-item.index');
    }

    public function create() {
        return view('other-item.create');
    }

    public function edit(CourseOther $other, String $id) {
        $items = Other::find($id);
        
        return view('other-item.edit', compact('items'));
    }

    public function store(CourseOther $other, StoreOtherItemRequest $request) {
        $validated = $request->validated(); 
        
        $str_lower = strtolower($validated['name']);
        $cooked = str_replace(' ', '-', $str_lower);

        $o = new Other;
        $o->course_other_id = $other->id;
        $o->user_id = Auth::id();
        $o->tag = $cooked;
        $o->name = $validated['name'];
        $o->price = $validated['price'] * 100;

        $o->save();

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Other Fee Item successfully added',
        ]);
    }

    public function destroy(CourseOther $other, String $id){ 
        $other_item = Other::find($id);

        $otherExists = $other->has('application')->exists(); 

        if($otherExists) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'Couldn\'t update due to student already used this fee',
            ]);
        }
        
        try { 
            $other_item->delete();

            return response()->json([
                'status' => true,
                'message' => 'Successfully Deleted',
            ]);

        }catch (Exception $e) { 
            return response()->json([
                'status' => false,
                'message' => e,
            ]);
        }
    }

    public function update(CourseOther $other, String $id, StoreOtherItemRequest $request) { 
        $validated = $request->validated(); 
        
        $otherExists = $other->has('application')->exists(); 

        if($otherExists) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'Couldn\'t update due to student already used this fee',
            ]);
        }
        
        try { 
            Other::where('id', $id)->update([
                'name' => $validated['name'],
                'price' => $validated['price'] * 100,
            ]);

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Other fee item successfully updated',
        ]);

        }catch (Exception $e) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'Something went wrong',
            ]);
        }
    }
}
