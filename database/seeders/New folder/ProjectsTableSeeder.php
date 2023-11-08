<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Project;


class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
 
        // Create 10 Project records
        foreach(range(1,10) as $index)
		{
            Project::create([
                'name' => $faker->text(30),			
                'sdate' => $faker->date(),
                'edate' => $faker->date(),
				'status' => $faker->word(20),
				'description' => $faker->text(120),				
                'pageId' => $faker->unique()->numberBetween($min = 1, $max = 10),
                'image' => $faker->image(),
                'imagePath' => $faker->imageUrl(),
                'username' => $faker->userName,				
            ]);
        }
    }
}
