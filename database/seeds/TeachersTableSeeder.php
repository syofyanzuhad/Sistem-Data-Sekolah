<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class TeachersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        for ($j=1; $j < 10; $j++) { 
            \App\Teacher::create([
                'name' => $faker->name(),
                'photo' => $faker->imageUrl(480, 640, 'teacher'),
                'job' => $faker->jobTitle,
                'address' => $faker->address,
                'cities' => $j,
                'supervisor_id' => $j
            ]);
        }
        
    }
}
