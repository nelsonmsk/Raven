<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Plan;


class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Plan records
        foreach(range(1,10) as $index)
		{
            Plan::create([		
                'name' => $faker->word(10),
                'description' => $faker->sentences(8),
                'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
                'pageId' => $faker->unique()->numberBetween($min = 1, $max = 10),
                'username' => $faker->userName,				
            ]);
        }
    }
}
