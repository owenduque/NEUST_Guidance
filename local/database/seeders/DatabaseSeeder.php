<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CounselorSeeder extends Seeder
{
    /**
     * Seed the counselors table with initial data.
     *
     * @return void
     */
    public function run()
    {
        $counselorsData = [
            [
                'user_type' => '1',
                'firstname' => 'Counselor Name',
                'middlename' => 'Counselor Middle Name',
                'surname' => 'Counselor Last Name',
                'email' => 'counselor@gmail.com',
                'password' => Hash::make('password'),
            ],
        ];

        foreach ($counselorsData as $counselor) {
            DB::table('counselors')->insert($counselor);
        }
    }
}
