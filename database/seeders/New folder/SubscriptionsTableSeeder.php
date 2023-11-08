<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Subscription;


class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Subscription records
        foreach(range(1,10) as $index)
		{
            Subscription::create([
                'email' => $faker->unique()->email,			
                'status' => $faker->word(20),
                'username' => $faker->userName,				
            ]);
        }
    }
}
