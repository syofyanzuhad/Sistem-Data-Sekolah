<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('en_US');

        for ($i=1; $i < 10; $i++) { 
            \App\Student::create([
                'nik' => $faker->phoneNumber,
                'name' => $faker->name(),
                'photo' => $faker->imageUrl(480, 640, 'student'),
                'address' => $faker->address,
                'classes_id' => $i,
                'supervisor_id' => $i,
                'cities_id' => $i
            ]);
        }
        
    }
}
