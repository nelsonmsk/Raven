<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Banner;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
        // Create 10 Banners records
        foreach(range(1,10) as $index)
		{
            Banner::create([
                'heading' => $faker->text(60),			
                'subheading' => $faker->text(90),
                'body' => $faker->text(250),
                'pageId' => $faker->unique()->numberBetween($min = 1, $max = 10),
                'username' => $faker->userName,					
            ]);
        }
    }
}
