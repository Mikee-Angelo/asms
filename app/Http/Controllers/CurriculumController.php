<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//Models
use App\Models\Curriculum;

//Others
use Yajra\DataTables\DataTables;

class CurriculumController extends Controller
{
    //
    public function index(Request $request) { 

        $curriculums = Curriculum::get(); 

        if($request->ajax()){ 
            return DataTables::of($curriculums)
                    ->addColumn('curriculum', function($row) { 
                        return 'Curriculum '.$row->id;
                    })
                    ->addColumn('action', function($row){
                        $btn = '<button type="button" data-remote="'.$row->id.'" class="set-default-btn inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" '.($row->is_default ? "disabled" : "").'>Set Default</button>';
                        return $btn;
                    })
                    ->addColumn('created_at', function($row) { 
                        return Carbon::parse($row->created_at)->format('F d, Y g:i A');
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('curriculum.index');
    }

    public function store(){ 
        $curriculum = new Curriculum; 

        $curriculum->user_id = Auth::id();
        $curriculum->save(); 

        return back()->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Curriculum generated successfully',
        ]);
    }

    public function update(Curriculum $curriculum) { 

        DB::beginTransaction();

        try{ 
            Curriculum::where('is_default', true)->update(['is_default' => false]); 

            $curriculum->update([
                'is_default' => true
            ]);

        }catch(\Exception $e) { 

            DB::rollback();
            return response()->json([
                'status' => false,
                'message' => $e,
            ]);
        }

        DB::commit();

        return response()->json([
            'status' => true,
            'message' => 'Curriculum '.$curriculum->id. ' was set to default',
        ]);
    }

}
