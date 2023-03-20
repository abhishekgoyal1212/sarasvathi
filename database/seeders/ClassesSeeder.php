<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = array(
            array(
                'name' => '5th',
                'description' => '5th',
                'slug' => '5th',
                'above_10' => 0,
                'status' => 1,
            ), array(
                'name' => '6th',
                'description' => '6th',
                'slug' => '6th',
                'above_10' => 0,
                'status' => 1,
            ), array(
                'name' => '7th',
                'description' => '7th',
                'slug' => '7th',
                'above_10' => 0,
                'status' => 1,
            ), array(
                'name' => '8th',
                'description' => '8th',
                'slug' => '8th',
                'above_10' => 0,
                'status' => 1,
            ), array(
                'name' => '9th',
                'description' => '9th',
                'slug' => '9th',
                'above_10' => 0,
                'status' => 1,
            ),
            array(
                'name' => '10th',
                'description' => '10th',
                'slug' => '10th',
                'above_10' => 0,
                'status' => 1,
            ),
            array(
                'name' => '11th',
                'description' => '11th',
                'slug' => '11th',
                'above_10' => 1,
                'status' => 1,
            ),
            array(
                'name' => '12th',
                'description' => '12th',
                'slug' => '12th',
                'above_10' => 1,
                'status' => 1,
            ),
            array(
                'name' => '12+',
                'description' => '12+',
                'slug' => '12',
                'above_10' => 1,
                'status' => 1,
            ),
        );
        Classes::insert($inputs);
    }
}
