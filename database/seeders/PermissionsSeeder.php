<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Course
        Permission::create(['name' => 'view course']);
        Permission::create(['name' => 'add course']);
        Permission::create(['name' => 'delete course']);
        Permission::create(['name' => 'edit course']);

        //Subjects
        Permission::create(['name' => 'view subjects']);
        Permission::create(['name' => 'add subjects']);
        Permission::create(['name' => 'delete subjects']);
        Permission::create(['name' => 'edit subjects']);

        //Students
        Permission::create(['name' => 'view students']);
        Permission::create(['name' => 'add students']);
        Permission::create(['name' => 'delete students']);
        Permission::create(['name' => 'edit students']);

        //Applications
        Permission::create(['name' => 'view applications']);
        Permission::create(['name' => 'add applications']);
        Permission::create(['name' => 'delete applications']);
        Permission::create(['name' => 'edit applications']);

        //Pricings
        Permission::create(['name' => 'view pricings']);
        Permission::create(['name' => 'add pricings']);
        Permission::create(['name' => 'delete pricings']);
        Permission::create(['name' => 'edit pricings']);

        //Roles
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'add roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'edit roles']);
    }
}
