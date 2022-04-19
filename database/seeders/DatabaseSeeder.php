<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SuperAdminSeeder::class,
            RolesSeeder::class,
            PermissionsSeeder::class,
            CurriculumSeeder::class,
            CoursesSeeder::class,
            MailContentSeeder::class,
            SubjectsSeeder::class,
        ]);
    }
}
