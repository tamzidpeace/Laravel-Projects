<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_seats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id');
            $table->integer('general_total')->default(0);
            $table->integer('general_avail')->default(0);
            $table->integer('general_booked')->default(0);
            $table->integer('cost_gen')->default(0);
            $table->integer('cabin_ac_total')->default(0);
            $table->integer('cabin_ac_avail')->default(0);
            $table->integer('cabin_ac_booked')->default(0);
            $table->integer('cost_ac')->default(0);
            $table->integer('cabin_nac_total')->default(0);
            $table->integer('cabin_nac_avail')->default(0);
            $table->integer('cabin_nac_booked')->default(0);
            $table->integer('cost_nac')->default(0);
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
        Schema::dropIfExists('hospital_seats');
    }
}
