<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            'fullname' => 'School',
            'username' => 'School',
            'email' => 'school@gmail.com',
            'password' => Hash::make('school1234'),
            'mobile' => '9876543210',
            'user_status' => 1,
            'user_block_status' => 0,
        ];
        School::create($inputs);
    }
}
