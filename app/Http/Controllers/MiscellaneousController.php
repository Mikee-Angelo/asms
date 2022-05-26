<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Miscellaneous;
use App\Models\SchoolYear;
use App\Models\Enrollment;
use App\Models\CourseMiscellaneous;

//Others
use Yajra\DataTables\DataTables;

//Facades
use Illuminate\Support\Facades\Auth;

//Request
use App\Http\Requests\Miscellaneous\StoreMiscellaneousRequest;

class MiscellaneousController extends Controller
{
    //
    public function index(CourseMiscellaneous $miscellaneou, Request $request) { 
        if($request->ajax()){ 


            return DataTables::of($miscellaneou->fees)
                    ->addColumn('price', function($row){
                        return '₱ '.$row->price / 100;
                    })
                    ->addColumn('action', function($row) use ($miscellaneou){
                        if(Auth::user()->hasRole('Student') ) { 
                            return '--';
                        }

                        return '
                            <a href="'.route('miscellaneous.item.edit', ['miscellaneou' => $miscellaneou->id, 'item' => $row->id]).'" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25">Edit</a>
                            <button type="button" data-remote="'.$row->id.'" class="inline-flex items-center px-4 py-2 ml-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-red-800 border border-transparent rounded-md del-btn hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-gray-300 disabled:opacity-25">Delete</button>
                        ';       
                    
                    })
                    ->make(true);
        }

        $hasEnrolled = $miscellaneou->has('application')->exists();
        
        return view('miscellaneous-item.index', compact('hasEnrolled'));
    }

    public function create() {
        return view('miscellaneous-item.create');
    }

    public function edit(CourseMiscellaneous $miscellaneou, String $id) {
        $miscellaneous = Miscellaneous::find($id);
         
        return view('miscellaneous-item.edit', compact('miscellaneous'));
    }

    public function store(CourseMiscellaneous $miscellaneou, StoreMiscellaneousRequest $request) { 
        $validated = $request->validated(); 

        $str_lower = strtolower($validated['name']);
        $cooked = str_replace(' ', '-', $str_lower);

        $miscellaneous = new Miscellaneous;
        $miscellaneous->course_miscellaneous_id = $miscellaneou->id;
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

    public function destroy(CourseMiscellaneous $miscellaneou, String $id){ 
        $miscellaneous = Miscellaneous::find($id);

        try { 
            $miscellaneous->delete();

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

    public function update(CourseMiscellaneous $miscellaneou, String $id, StoreMiscellaneousRequest $request) { 
        $validated = $request->validated(); 
        
        $miscellaneousExists = $miscellaneou->has('application')->exists(); 

        if($miscellaneousExists) { 
            return back()->with('status', [
                'success' => false, 
                'message' => 'Error', 
                'description' => 'Couldn\'t update due to student already used this fee',
            ]);
        }
        
        try { 
            Miscellaneous::where('id', $id)->update([
                'name' => $validated['name'],
                'price' => $validated['price'] * 100,
            ]);

            return back()->with('status', [
                'success' => true, 
                'message' => 'Success', 
                'description' => 'Miscellaneous successfully updated',
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
