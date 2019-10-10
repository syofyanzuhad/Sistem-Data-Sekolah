<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(StudentsTableSeeder::class);

        $faker = Faker::create('en_US');

        // \App\User::create([
        //     'name' => "admin",
        //     'email' => "admin@gmail.com",
        //     'password' => bcrypt('123')
        // ]);

        // for ($k=1; $k < 7; $k++) { 
        //     \App\Classes::create([
        //         'class' => $k . 'A',
        //         // 'students_of' => $k,
        //         // 'supervisor_of' => $k
        //         ]);
        //     }

        // for ($k=1; $k < 7; $k++) { 
        //     \App\City::create([
        //         'city' => $faker->city,
        //         // 'pupils_of' => $k,
        //         // 'teachers_of' => $k
        //         ]);
        //     }
        
        // for ($j=1; $j <= 6; $j++) { 
        //     \App\Teacher::create([
        //         'teacher_name' => $faker->name(),
        //         'photo' => $faker->imageUrl(480, 640),
        //         'job' => $faker->jobTitle,
        //         'address' => $faker->address,
        //         'cities_id' => $j,
        //         'supervisor_id' => $j
        //         ]);
        //     }

        for ($i=1; $i <= 6; $i++) { 
            \App\Student::create([
                'nik' => $faker->ean8,
                'name' => $faker->name(),
                'photo' => $faker->imageUrl(480, 640),
                'address' => $faker->address,
                'classes_id' => $i,
                'teacher_id' => $i,
                'city_id' => $i
            ]);
        }
    }
}
