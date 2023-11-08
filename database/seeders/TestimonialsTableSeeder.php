<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Testimonial;


class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Testimonial records
        foreach(range(1,10) as $index)
		{
            Testimonial::create([
                'name' => $faker->name(30),			
                'title' => $faker->jobTitle(30),
                'comment' => $faker->text(90),
                'pageId' => $faker->unique()->numberBetween($min = 1, $max = 10),
                'username' => $faker->userName,					
            ]);
        }
    }
}
