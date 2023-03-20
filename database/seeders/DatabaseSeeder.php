<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            adminLogin::class,
            InstructorSeeder::class,
            TagsSeeder::class,
            DynamicSeeder::class,
            BoardSeeder::class,
            ClassesSeeder::class,
            SubjectSeeder::class,
            TutorSeeder::class,
            SchoolSeeder::class,
            CountryCodeSeeder::class,
        ]);
    }
}
