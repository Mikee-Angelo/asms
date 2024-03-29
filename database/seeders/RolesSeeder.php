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
        Role::create(['name' => 'Registrar Head']);
        Role::create(['name' => 'Dean']);
        Role::create(['name' => 'Instructor']);
        Role::create(['name' => 'Student']);
        Role::create(['name' => 'Accounting Head']);

    }
}
