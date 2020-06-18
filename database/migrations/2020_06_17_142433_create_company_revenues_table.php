<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_revenues', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('no_of_seats');
            $table->string('revenue_type');
            $table->integer('price_per_seat');
            $table->integer('monthly_rent');
            $table->integer('gst_rate');
            $table->integer('invoice_amount');
            $table->string('invoice_number');
            $table->string('invoice_date');
            $table->string('received_date');
            $table->string('payment_status');
            $table->string('payment_month');
            $table->integer('amount_received');
            $table->integer('amount_invoice');
            $table->integer('tds_received');
            $table->integer('discount_percentage');
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
        Schema::dropIfExists('company_revenues');
    }
}
