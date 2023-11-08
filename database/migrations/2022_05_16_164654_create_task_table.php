<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('project_id');
			$table->unsignedBigInteger('user_id');		
		    $table->string('name');
		    $table->text('description')->nullable();		
            $table->timestamps();
        });
		Schema::table('task', function($table) {
			$table->foreign('project_id')->references('id')->on('projects');
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
		Schema::table('task', function($table) {		
			$table->dropForeign(['project_id']);
			$table->dropColumn('project_id');
			$table->dropForeign(['user_id']);
			$table->dropColumn('user_id');		
		});		
        Schema::dropIfExists('task');
    }
}
