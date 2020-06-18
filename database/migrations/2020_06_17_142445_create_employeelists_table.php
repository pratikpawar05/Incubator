<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeelists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_Name');
            $table->string('gender');
            $table->integer('contact');
            $table->string('DOB');
            $table->string('address');
            $table->string('email');
            $table->integer('aadhar_Card');
            $table->string('pan_card');
            $table->string('company_Name');
            $table->string('access_card');
            $table->integer('card_no');
            $table->string('cabin_access');
            $table->string('Card_Types');
            $table->string('date_of_Joining');
            $table->string('designation');
            $table->integer('status');
            $table->integer('member_id');
            $table->string('btn_class');
            $table->string('address_proof');
            $table->string('id_proof');
            $table->string('user_logo');
            $table->string('MARITAL_STATUS');
            $table->string('months');
            $table->string('marital_status');
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
        Schema::dropIfExists('employeelists');
    }
}
