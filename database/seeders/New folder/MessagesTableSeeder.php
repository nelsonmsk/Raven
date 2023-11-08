<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Message;


class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Message records
        foreach(range(1,10) as $index)
		{
            Message::create([		
                'name' => $faker->name(30),
                'email' => $faker->email(30),
                'subject' => $faker->text(60),
                'message' => $faker->text(120),
                'username' => $faker->userName,				
            ]);
        }
    }
}
