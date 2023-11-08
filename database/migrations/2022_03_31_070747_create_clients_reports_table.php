<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_reports', function (Blueprint $table) {
            $table->id();
			$table->string('title');			
			$table->string('subtitle');
		    $table->date('fromdate');
		    $table->date('todate');
		    $table->string('city');
		    $table->string('country');			
		    $table->string('subsquery');						
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
        Schema::dropIfExists('clients_reports');
    }
}
