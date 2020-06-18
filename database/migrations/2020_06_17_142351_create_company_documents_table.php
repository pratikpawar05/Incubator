<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("company_id")->unsigned();
            $table->foreign('company_id')->references('id')->on('company_masters');
            $table->string("company_pan_path");
            $table->string("company_tan_path");
            $table->string("company_adress_proof_path");
            $table->string("company_coi_path");
            $table->string("company_gst_certificate_path");
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
        Schema::dropIfExists('company_documents');
    }
}
