<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
			$table->string('name');	
			$table->string('type');				
			$table->date('sdate');
		    $table->date('edate');
		    $table->string('status');
		    $table->text('description');						
			$table->string('username');	
			$table->unsignedBigInteger('client_id');			
            $table->timestamps();
        });
		Schema::table('projects', function($table) {
			$table->foreign('client_id')->references('id')->on('clients');			
		});			
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    Schema::table('projects', function($table) {		
        $table->dropForeign(['client_id']);
        $table->dropColumn('client_id');		
    });		
        Schema::dropIfExists('projects');
    }
}
