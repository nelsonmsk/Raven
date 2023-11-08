<?php


use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreatePersonalInfosTable extends Migration
{
 
   /**
     * Run the migrations.
     *

     * @return void
     */
 

   public function up()
    {
 
       Schema::create('personal_infos', function (Blueprint $table) {
 
           $table->increments('id');

	   $table->integer('uid');
	   $table->string('branchcode');
	   $table->integer('mebid');
	   $table->string('name');
	   $table->string('surname');
	   $table->date('dob');
	   $table->string('bCertificate');
	   $table->string('nationalId');
	   $table->string('gender');
	   $table->string('mstatus');
	   $table->string('wstatus');
	   $table->string('cellphone');
	   $table->string('address');
	   $table->string('email');
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
  
      Schema::dropIfExists('personal_infos');

    }

}
