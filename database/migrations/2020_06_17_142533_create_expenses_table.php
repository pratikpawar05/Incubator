<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->integer('fixed_total');
            $table->integer('salaries');
            $table->integer('marketing');
            $table->integer('tech');
            $table->integer('electricity');
            $table->integer('cafe_total');
            $table->integer('ccd_materials');
            $table->integer('pantry_materials');
            $table->integer('water_bills');
            $table->integer('travel_hotel_conveyance_total');
            $table->integer('travel');
            $table->integer('conveyance');
            $table->integer('stay');
            $table->integer('integer_charge');
            $table->integer('marketing_total');
            $table->integer('google_ads');
            $table->integer('facebook_ads');
            $table->integer('collaterals');
            $table->integer('events_total');
            $table->integer('entertainment');
            $table->integer('event');
            $table->integer('gifting');
            $table->integer('commission');
            $table->integer('misc_total');
            $table->integer('internet_cable_rent');
            $table->integer('pest_control_monthly');
            $table->integer('meeting_room_booking_license');
            $table->integer('stationery');
            $table->integer('employee_health');
            $table->integer('fixtures_fittings');
            $table->integer('additional_total');
            $table->integer('house_keeping');
            $table->integer('generator');
            $table->integer('total');
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
        Schema::dropIfExists('expenses');
    }
}
