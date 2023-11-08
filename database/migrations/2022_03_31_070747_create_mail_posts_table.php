


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_posts', function (Blueprint $table) {
            $table->id();
			$table->string('to');			
			$table->string('cc');
		    $table->string('from');
			$table->string('subject');			
			$table->text('message');
		    $table->string('image');
		    $table->string('imagePath');
			$table->string('status');			
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
        Schema::dropIfExists('mail_posts');
    }
}
