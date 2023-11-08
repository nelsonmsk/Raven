<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\MailSubscription;


class MailSubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 MailSubscription records
        foreach(range(1,10) as $index)
		{
            MailSubscription::create([
                'email' => $faker->unique()->email,			
                'status' => $faker->word(20),
                'username' => $faker->userName,				
            ]);
        }
    }
}
