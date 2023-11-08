<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Booking;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        // Create 10 Booking records
        foreach(range(1,10) as $index)
		{
            Booking::create([ 
                'dor' => $faker->date(),
                'rtime' => $faker->time(),
                'partySize' => $faker->numberBetween($min = 1, $max = 1000),
                'cName' => $faker->name(30),
                'cPhone' => $faker->phoneNumber(20),
                'cEmail' => $faker->email(30),				
                'status' => $faker->word(10),				
                'username' => $faker->userName,				
            ]);
        }
   
    
    }
}