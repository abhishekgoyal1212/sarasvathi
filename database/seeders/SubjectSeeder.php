<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
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
                'name' => 'Maths',
                'description' => 'Maths',
                'slug' => 'maths',
                'icon' => '',
                'board_id' => 1,
                'class_id' => 5,
                'uploader_id' => 1,
                'stream_select' => 0,
                'hexcolor_1' => '#000000',
                'hexcolor_2' => '#000000',
                'uploader_type' => 1,

                'status' => 1,
            ),
            array(
                'name' => 'Science',
                'description' => 'Science',
                'slug' => 'science',
                'icon' => '',
                'board_id' => 2,
                'class_id' => 6,
                'uploader_id' => 1,
                'stream_select' => 0,
                'hexcolor_1' => '#000000',
                'hexcolor_2' => '#000000',
                'uploader_type' => 1,

                'status' => 1,
            ),
            array(
                'name' => 'Physics',
                'description' => 'Physics',
                'slug' => 'physics',
                'icon' => '',
                'board_id' => 2,
                'class_id' => 7,
                'uploader_id' => 1,
                'stream_select' => 1,
                'hexcolor_1' => '#000000',
                'hexcolor_2' => '#000000',
                'uploader_type' => 1,

                'status' => 1,
            ),
            array(
                'name' => 'Economics',
                'description' => 'Economics',
                'slug' => 'economics',
                'icon' => '',
                'board_id' => 1,
                'class_id' => 8,
                'uploader_id' => 1,
                'stream_select' => 2,
                'hexcolor_1' => '#000000',
                'hexcolor_2' => '#000000',
                'uploader_type' => 1,

                'status' => 1,
            )
        );
        Subject::insert($inputs);
    }
}
