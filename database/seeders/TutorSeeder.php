<?php

namespace Database\Seeders;

use App\Models\Tutor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            'fullname' => 'tutor',
            'username' => 'tutor',
            'email' => 'tutor@gmail.com',
            'password' => Hash::make('tutor1234'),
            'dob' => '2020-12-20',
            'mobile' => '9876543210',
            'user_status' => 1,
            'user_block_status' => 0,
        ];
        Tutor::create($inputs);
    }
}
