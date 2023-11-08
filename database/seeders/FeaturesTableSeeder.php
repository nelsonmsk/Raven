<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();		
        // Create 10 Feature records
        foreach(range(1,10) as $index)
		{
            Feature::create([
                'title' => $faker->text(30),
                'body' => $faker->text(150),
                'icon' => $faker->text(10),				
                'pageId' => $faker->unique()->numberBetween($min = 1, $max = 10),
                'username' => $faker->userName,				
            ]);
        }
    }
}
