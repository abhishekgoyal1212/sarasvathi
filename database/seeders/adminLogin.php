<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class adminLogin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            'fullname' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user1234'),
            'dob' => '2020-12-20',
            'mobile' => '9876543210',
            'country_code' => '91',
            'login_type' => 'mobile',
            'role_status' => 1,
            'user_status' => 1,
            'user_block_status' => 0,
        ];
        User::create($inputs);

        $inputs = [
            'fullname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'dob' => '2020-12-20',
            'mobile' => '7894561230',
            'user_status' => 1,
            'user_block_status' => 0,
        ];
        Admin::create($inputs);
    }
}
