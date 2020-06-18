<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_masters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_registered_name');
            $table->string('brand_name');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('date_of_incorporation');
            $table->integer('tenure');
            $table->integer('lock_in');
            $table->string('status');
            $table->integer('notice_period');
            $table->text('registered_address');
            $table->string('gst_no');
            $table->string('company_pan_number');
            $table->string('company_tan_number');
            $table->string('company_cin_number');
            $table->string('banner_source');
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
        Schema::dropIfExists('company_masters');
    }
}
