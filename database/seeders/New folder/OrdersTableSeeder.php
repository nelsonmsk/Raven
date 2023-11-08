<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
        // Create 10 Order records
        foreach(range(1,10) as $index)
		{
            Order::create([
                'items' => $faker->text(240),
                'subTotal' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
                'sRequest' => $faker->text(240),
                'cName' => $faker->name(30),
                'cPhone' => $faker->phoneNumber(20),
                'cAddress' => $faker->address(90),
                'cEmail' => $faker->email(30),				
                'username' => $faker->userName,				
            ]);
        }
   
    
    }
}
