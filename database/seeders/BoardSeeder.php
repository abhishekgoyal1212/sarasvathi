<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Board;

class BoardSeeder extends Seeder
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
                'name' => 'CBSE',
                'description' => 'CBSE',
                'icon' => '',
                'slug' => 'cbse',
                'status' => 1,
            ),
            array(
                'name' => 'Maharashtra State Board',
                'description' => 'Maharashtra State Board',
                'icon' => '',
                'slug' => 'maharashtra-state-board',
                'status' => 1,
            ),
            array(
                'name' => 'ICSE',
                'description' => 'ICSE',
                'icon' => '',
                'slug' => 'icse',
                'status' => 1,
            ),
            array(
                'name' => 'Andhra Pradesh State Board',
                'description' => 'Andhra Pradesh State Board',
                'icon' => '',
                'slug' => 'andhra-pradesh-state-board',
                'status' => 1,
            ),
            array(
                'name' => 'Telangana State Board',
                'description' => 'Telangana State Board',
                'icon' => '',
                'slug' => 'telangana-state-board',
                'status' => 1,
            )
        );
        Board::insert($inputs);
    }
}
