<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("company_id")->unsigned();
            $table->foreign('company_id')->references('id')->on('company_masters');
            $table->string("type_of_desk");
            $table->integer("no_of_desk");
            $table->integer("price_per_seat");
            $table->integer("net_total");
            $table->integer("annual_net_total");
            $table->integer("annual_increment");
            $table->integer("deposits_in_month");
            $table->integer("deposits_amount");
            $table->integer("deposits_received");
            $table->string("deposits_received_date");
            $table->integer("deposits_reference_no");
            $table->integer("agreement_term_in_years");
            $table->integer("notice_period");
            $table->integer("meeting_room_credits");
            $table->integer("discount_months");
            $table->integer("amount_after_discounts");
            $table->string("director_name");
            $table->integer("din_number");
            $table->integer("director_contact");
            $table->string("director_email");
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
        Schema::dropIfExists('company_deals');
    }
}
