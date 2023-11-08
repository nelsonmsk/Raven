<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_reports', function (Blueprint $table) {
            $table->id();
			$table->string('title');			
			$table->string('subtitle');
		    $table->date('fromdate');
		    $table->date('todate');
		    $table->string('type');
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
        Schema::dropIfExists('users_reports');
    }
}
