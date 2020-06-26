<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_revenues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('revenue_type');
            $table->string('invoice_amt_gst');
            $table->string('total_amt');
            $table->string('payment_status');
            $table->string('payment_month');
            $table->string('invoice_no');
            $table->string('invoice_date');
            $table->string('received_date');
            $table->string('invoice_amt'); 
            $table->string('amount_received'); 
            $table->string('invoice_amount'); 
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
        Schema::dropIfExists('additional_revenues');
    }
}
