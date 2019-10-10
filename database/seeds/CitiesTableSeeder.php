<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CitiesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        for ($k=1; $k < 6; $k++) { 
            \App\City::create([
                'name' => $k . 'A'
                ]);
                
            }
        
    }
}
