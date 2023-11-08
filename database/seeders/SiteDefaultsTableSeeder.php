<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\SiteDefaults;

class SiteDefaultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
 
        $faker = Faker::create();
 
        // Create 10 SiteDefaults records
        foreach(range(1,10) as $index)
		{
            SiteDefaults::create([
                'companyName' => $faker->company(60),
                'appTitle' => $faker->company(30),
                'introText' => $faker->text(50),
                'linkText' => $faker->text(30),
                'aboutText' => $faker->paragraph(4),
                'facebook' => $faker->unique()->url(30),
                'twitter' => $faker->unique()->url(30),
                'instagram' => $faker->unique()->url(30),
                'whatsapp' => $faker->unique()->url(30),
                'phone' => $faker->phoneNumber(20),
                'email' => $faker->unique()->companyEmail,
                'address' => $faker->address(60),
                'username' => $faker->userName,				
            ]);
        }
   
    }
}
