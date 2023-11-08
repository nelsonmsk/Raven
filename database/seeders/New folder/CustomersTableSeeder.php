<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        // Create 10 Customer records
        foreach(range(1,10) as $index)
		{
            Customer::create([
                'name' => $faker->name(30),
                'email' => $faker->unique()->email,				
                'phone' => $faker->phoneNumber(20),
                'address' => $faker->address(90),
                'city' => $faker->city(20),
                'country' => $faker->country(20),				
                'username' => $faker->userName,				
            ]);
        }
   
    
    }
}
