<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ManageController extends Controller
{
    //
    public function index() { 
        $roles = Role::all()->pluck('name');
        

        return view('super-admin.manage.index', compact('roles'));
    }
}
