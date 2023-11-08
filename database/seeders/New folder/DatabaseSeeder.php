<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *

     * @return void
     */


    public function run()
    {


	$this->call([
		AppDefaultsTableSeeder::class,
		BookingsTableSeeder::class,	
		CustomersReportsTableSeeder::class,
		CustomersTableSeeder::class,
		EquipmentsTableSeeder::class,
		GalleriesTableSeeder::class,		
		MailPostsTableSeeder::class,
		MessagesReportsTableSeeder::class,
		MessagesTableSeeder::class,
		OrdersTableSeeder::class,
		PlansTableSeeder::class,
		ProfilesTableSeeder::class,
		ProjectsReportsTableSeeder::class,
		ProjectsTableSeeder::class,
		ServicesTableSeeder::class,
		SubscriptionsTableSeeder::class,
		SubsReportsTableSeeder::class,
		TestimonialsTableSeeder::class,
		UsersReportsTableSeeder::class,
		UsersTableSeeder::class,	
	]);
    }

}
