<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Models
use App\Models\Mail;

class MailContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Mail::create([
            'tag' => 'Application',
            'description' => "Thankyou for enrolling to Subic Bay Colleges (SBCI), Inc. Here's your student account",
        ]);

        Mail::create([
            'tag' => 'Faculty Account',
            'description' => "Thankyou for enrolling to Subic Bay Colleges (SBCI), Inc. Here's your student account",
        ]);
    }
}
