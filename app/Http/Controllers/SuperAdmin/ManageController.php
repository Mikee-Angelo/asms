<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

//Others
use Yajra\DataTables\DataTables;

//Requests
use App\Http\Requests\Manage\StoreManageRequest; 


class ManageController extends Controller
{
    //
    public function index(Request $request) { 

        if($request->ajax()){ 

        $roles = Role::get();
            return DataTables::of($roles)
                    ->addColumn('action', function($row){
                        $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('super-admin.manage.index');
    }

    public function create() { 
        return view('super-admin.manage.create');
    }

    public function store(StoreManageRequest $request) { 
        $validated = $request->validated(); 

        $role = Role::create(['name' => $validated['name']]);

        $values = array_values($validated);

        for( $x= 1; $x < count($values); ++$x){
            $role->givePermissionTo($values[$x]);
        }

        return redirect('roles/create')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Role successfully added',
        ]);

    }
}
