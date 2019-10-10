<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClassesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('en_US');

        
        for ($k=1; $k < 6; $k++) { 
            \App\Classes::create([
                'name' => $k . 'A'
                ]);
                
            }
        
    }
}
