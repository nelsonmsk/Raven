<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
		    $table->string('name');
		    $table->string('email')->unique();
		    $table->string('phone');
		    $table->string('title');
		    $table->text('bio');
		    $table->text('address');
		    $table->string('facebook')->unique();
		    $table->string('twitter')->unique();			
			$table->string('instagram')->unique();
		    $table->string('linkedin')->unique();		
            $table->timestamps();	
			$table->unsignedBigInteger('user_id');			
        });	
		Schema::table('profiles', function($table) {
			$table->foreign('user_id')->references('id')->on('users');
		});			
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::table('profiles', function($table) {
		$table->dropUnique(['email']);
		$table->dropColumn('email');
        $table->dropUnique(['facebook']);
        $table->dropColumn('facebook');          
        $table->dropUnique(['twitter']);
        $table->dropColumn('twitter');
        $table->dropUnique(['instagram']);
        $table->dropColumn('instagram');          
        $table->dropUnique(['linkedin']);
        $table->dropColumn('linkedin');		
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });		
        Schema::dropIfExists('profiles');
    }
}
