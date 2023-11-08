<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\AppDefaults;

class AppDefaultsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
 
        $faker = Faker::create();
 
        // Create 10 AppDefaults records
        foreach(range(1,10) as $index)
		{
            AppDefaults::create([
                'companyName' => $faker->company(60),
                'appTitle' => $faker->company(30),
                'brandHeading' => $faker->text(60),				
                'introText' => $faker->text(60),
                'aboutText' => $faker->paragraph(4),
                'introVideo' => $faker->unique()->url(30),				
                'facebook' => $faker->unique()->url(30),
                'twitter' => $faker->unique()->url(30),
                'instagram' => $faker->unique()->url(30),
                'googleplus' => $faker->unique()->url(30),
                'youtube' => $faker->unique()->url(30),
                'linkedin' => $faker->unique()->url(30),				
                'whatsapp' => $faker->phoneNumber(20),
                'phone' => $faker->phoneNumber(20),
                'email' => $faker->unique()->companyEmail,
                'address' => $faker->address(60),
                'contactText' => $faker->paragraph(3),				
                'username' => $faker->userName,				
            ]);
        }
   
    }
}
