<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Curriculum;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::role('Super Admin')->first();

        $curriculum = new Curriculum; 

        $curriculum->user_id = $user->id;
        $curriculum->is_default = 1;
        $curriculum->save();
    }
}
