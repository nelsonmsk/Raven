<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects_reports', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');			
			$table->string('subtitle');
		    $table->date('sdate');
		    $table->date('edate');
		    $table->string('status');
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
        Schema::dropIfExists('projects_reports');
    }
}
