<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Newsletter;

class NewslettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Newsletter records
        foreach(range(1,10) as $index)
		{
            Newsletter::create([
                'title' => $faker->word(50),			
                'type' => $faker->word(50),
                'summary' => $faker->text(150),
                'created_by' => $faker->text(30),
                'status' => $faker->text(150),
                'published_date' => $faker->date(),				
                'image' => $faker->image(),
                'imagePath' => $faker->imageUrl(),			
                'username' => $faker->userName,					
            ]);
        }
    }
}
