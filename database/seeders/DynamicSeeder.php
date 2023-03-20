<?php

namespace Database\Seeders;

use App\Models\Dynamic;
use Illuminate\Database\Seeder;

class DynamicSeeder extends Seeder
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
                'heading' => 'Sarasvathi',
                'content' => '',
                'type' => 'logo'
            ),
            array(
                'heading' => 'home page',
                'content' => '',
                'type' => 'banner'
            ),
            array(
                'heading' => 'login page',
                'content' => 'login page',
                'type' => 'loginpage'
            )
        );
        Dynamic::insert($inputs);
    }
}
