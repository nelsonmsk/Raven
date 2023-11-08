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
		BannersTableSeeder::class,
		BookingsTableSeeder::class,	
		ClientsReportsTableSeeder::class,
		ClientsTableSeeder::class,
		EquipmentTableSeeder::class,
		FeaturesTableSeeder::class,		
		GalleryImagesTableSeeder::class,		
		MailPostsTableSeeder::class,
		MailSubscriptionsTableSeeder::class,		
		MessagesReportsTableSeeder::class,
		MessagesTableSeeder::class,
		NewslettersTableSeeder::class,		
		OrdersTableSeeder::class,
		PlansTableSeeder::class,
		//ProfilesTableSeeder::class,
		ProjectsReportsTableSeeder::class,
		//ProjectsTableSeeder::class,
		ProjectTypesTableSeeder::class,	
		ServicesTableSeeder::class,
		SubsReportsTableSeeder::class,
		SupportsTableSeeder::class,
		TestimonialsTableSeeder::class,
		UsersReportsTableSeeder::class,
		UsersTableSeeder::class,	
	]);
    }

}
