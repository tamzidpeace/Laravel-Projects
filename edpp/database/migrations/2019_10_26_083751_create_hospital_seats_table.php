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
            $table->integer('total_seat')->default(0);
            $table->integer('available_seat')->default(0);
            $table->integer('booked_seat')->default(0);
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
