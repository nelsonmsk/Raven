<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CustomersReport;


class CustomersReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 CustomersReport records
        foreach(range(1,10) as $index)
		{
            CustomersReport::create([
                'title' => $faker->text(40),			
                'subtitle' => $faker->text(20),
                'fromdate' => $faker->date(),	
                'todate' => $faker->date(),			
                'city' => $faker->city(10),
                'country' => $faker->country(10),				
                'subsquery' => $faker->text(60),				
                'username' => $faker->userName,					
            ]);
        }
    }
}
