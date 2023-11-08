<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Gallery;

class GalleriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Gallery records
        foreach(range(1,10) as $index)
		{
            Gallery::create([
                'name' => $faker->text(30),
                'description' => $faker->text(50),
                'pageId' => $faker->unique()->numberBetween($min = 1, $max = 10),
                'image' => $faker->image(),				
                'imagePath' => $faker->imageUrl(),
                'username' => $faker->userName,				
            ]);
        }
   
           //
    }
}
