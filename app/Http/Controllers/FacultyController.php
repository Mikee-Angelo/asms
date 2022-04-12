<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Facades
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

//Others
use Yajra\DataTables\DataTables;
use Spatie\Permission\Models\Role;

//Models
use App\Models\User;

//Requests
use App\Http\Requests\Faculty\CreateFacultyRequest;

//Mail
use App\Mail\FacultyMail; 

class FacultyController extends Controller
{
    //
    public function index(Request $request) {

        $users = User::doesntHave('Student')->get();

        if($request->ajax()){ 
            return DataTables::of($users)
              ->addColumn('action', function($row){
                    $btn = '<a href="'.route('courses.show', ['course' => $row->id]).'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('faculty.index');
    }

    public function show() { 
        
    }

    public function create() { 
        $roles = Role::whereNotIn('name', ['Student'])->get();

        return view('faculty.create', compact('roles'));
    }

    public function store(CreateFacultyRequest $request) { 
        $validated = $request->validated(); 
        $customPassword = Str::random(8);
        
        $user = new User; 
        
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($customPassword);

        $user->save();

        $user->assignRole($request['role']);

        Mail::to($request['email'])->send(new FacultyMail($user, $customPassword));

        return redirect('faculty/create')->with('status', [
            'success' => true, 
            'message' => 'Success', 
            'description' => 'Faculty successfully added',
        ]);
    }
}
