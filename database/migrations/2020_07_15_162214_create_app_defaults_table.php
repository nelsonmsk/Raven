<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppDefaultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_defaults', function (Blueprint $table) {
            $table->increments('id');
			$table->string('companyName');			
			$table->string('appTitle');
		    $table->string('brandHeading');			
		    $table->string('introText');
		    $table->text('aboutText');
		    $table->string('introVideo')->unique();			
		    $table->string('facebook')->unique();
		    $table->string('twitter')->unique();			
			$table->string('instagram')->unique();
		    $table->string('googleplus')->unique();
		    $table->string('youtube')->unique();			
			$table->string('linkedin')->unique();			
			$table->string('whatsapp');
		    $table->string('phone');
		    $table->string('email')->unique();
		    $table->text('address');
		    $table->text('contactText');			
			$table->string('username');			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_defaults');
    }
}
