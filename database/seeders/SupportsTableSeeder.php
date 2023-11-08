<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Support;

class SupportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Support records
        foreach(range(1,10) as $index)
		{
            Support::create([
                'type' => $faker->text(30),			
                'title' => $faker->text(30),
                'question' => $faker->text(150),
                'answer' => $faker->text(250),				
                'video' => $faker->url(60),
                'username' => $faker->userName,				
            ]);
        }
   
           //
    }
}

