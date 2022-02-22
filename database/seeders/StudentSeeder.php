<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);

        $student = new Student; 

    	foreach (range(1,200) as $index) {
            Student::create([
                'student_number' => '221'.$index,
                'last_name' => $faker->lastName,
                'given_name' => $faker->firstName,
                'middle_name' => $faker->lastName,
                'status' => 1
            ]);

        }
    }
}
