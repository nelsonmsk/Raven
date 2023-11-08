<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\GalleryImage;

class GalleryImagesTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
        // Create 10 GalleryImage records
        foreach(range(1,10) as $index)
		{
            GalleryImage::create([
                'ref_class' => $faker->text(60),				
                'ref_id' => $faker->unique()->numberBetween($min = 1, $max = 10),
                'title' => $faker->text(60),				
                'description' => $faker->text(120),	
                'image' => $faker->image(),
                'imagePath' => $faker->imageUrl(),
                'username' => $faker->userName,					
            ]);
        }
    }
}

