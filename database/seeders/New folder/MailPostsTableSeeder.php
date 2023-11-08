<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\MailPost;

class MailPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 MailPost records
        foreach(range(1,10) as $index)
		{
            MailPost::create([
                'to' => $faker->email(30),			
                'cc' => $faker->email(30),
                'from' => $faker->email(30),
                'subject' => $faker->text(30),
                'message' => $faker->text(150),
                'image' => $faker->image(),
                'imagePath' => $faker->imageUrl(),
                'status' => $faker->word(10),			
                'username' => $faker->userName,					
            ]);
        }
    }
}
