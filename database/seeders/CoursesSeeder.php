<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course; 

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $courses = [
            [
                'department_id' => 1,
                'code' => "BSIT",
                'course_name' => "Bachelor of Science in Information Tecnology",
                'type' => 1,
                'status' => 1
            ],

            [
                'department_id' => 1,
                'code' => "BSTM",
                'course_name' => "Bachelor of Science in Tourism Management",
                'type' => 1,
                'status' => 1,
            ],

            [
                'department_id' => 1,
                'code' => "BSENTREP",
                'course_name' => "Bachelor of Science in Entrepreneurship",
                'type' => 1,
                'status' => 1,
            ],

            [
                'department_id' => 1,
                'code' => "BSCRIM",
                'course_name' => "Bachelor of Science in Criminology",
                'type' => 1,
                'status' => 1
            ],

            [
                'department_id' => 1,
                'code' => "BSCA",
                'course_name' => "Bachelor of Science in Customs Administration",
                'type' => 1,
                'status' => 1
            ],

            [
                'department_id' => 1,
                'code' => "BSHM",
                'course_name' => "Bachelor of Science in Hotel Management",
                'type' => 1,
                'status' => 1
            ],

            [
                'department_id' => 1,
                'code' => "BEED",
                'course_name' => "Bachelor of Elementary Education (Major in General Education)",
                'type' => 1,
                'status' => 1
            ],
            [
                'department_id' => 1,
                'code' => "BSED",
                'course_name' => "Bachelor of Secondary Education (Major in Mathematics)",
                'type' => 1,
                'status' => 1
            ],
        ];

        foreach($courses as $course){ 

            $c = new Course; 
            $c->department_id = $course['department_id'];
            $c->code = $course['code'];
            $c->course_name = $course['course_name'];
            $c->type = $course['type'];
            $c->status = $course['status'];

            $c->save();
        }
    }
}
