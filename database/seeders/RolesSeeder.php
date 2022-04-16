<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            ['name' => 'Dean'],
            ['name' => 'Instructor'],
            ['name' => 'Student'],
            ['name' => 'Accounting Head'],
        ]);
    }
}
