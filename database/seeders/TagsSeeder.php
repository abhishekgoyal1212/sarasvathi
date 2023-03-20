<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tags;

class TagsSeeder extends Seeder
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
                'name' => 'tag 1',
                'slug' => 'tag-1',
                'status' => 1
            ), array(
                'name' => 'tag 2',
                'slug' => 'tag-2',
                'status' => 1
            ), array(
                'name' => 'tag 3',
                'slug' => 'tag-3',
                'status' => 1
            )
        );
        Tags::insert($inputs);
    }
}
