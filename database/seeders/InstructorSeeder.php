<?php

namespace Database\Seeders;

use App\Models\Instructor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $inputs = [
            'fullname' => 'Instructor',
            'username' => 'instructor',
            'email' => 'instructor@gmail.com',
            'password' => Hash::make('instructor1234'),
            'dob' => '2020-12-20',
            'mobile' => '7894561230',
            'school_id' => 1,
            'user_status' => 1,
            'user_block_status' => 0,
        ];
        Instructor::create($inputs);
    }
}
