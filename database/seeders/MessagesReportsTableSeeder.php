<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\MessagesReport;


class MessagesReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 MessagesReport records
        foreach(range(1,10) as $index)
		{
            MessagesReport::create([
                'title' => $faker->text(40),			
                'subtitle' => $faker->text(20),
                'fromdate' => $faker->date(),	
                'todate' => $faker->date(),			
                'subject' => $faker->word(10),
                'subsquery' => $faker->text(60),				
                'username' => $faker->userName,					
            ]);
        }
    }
}

