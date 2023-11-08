<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        // Create 10 Profile records
        foreach(range(1,10) as $index)
		{
            Profile::create([
                'name' => $faker->name(50),
                'email' => $faker->unique()->email(30),				
                'phone' => $faker->phoneNumber(30),
                'title' => $faker->jobTitle(30),				
                'bio' => $faker->text(150),				
                'address' => $faker->address(90),
                'facebook' => $faker->unique()->url(60),,
                'twitter' => $faker->unique()->url(60),				
                'instagram' => $faker->unique()->url(60),				
                'linkedin' => $faker->unique()->url(60),				
                'image' => $faker->image(),
                'imagePath' => $faker->imageUrl(),				
            ]);
        }
    }
}
