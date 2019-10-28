<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id');
            $table->integer('patient_id');
            $table->integer('department_id');
            $table->string('seat');
            $table->string('date');
            $table->string('patient_name');
            $table->integer('patient_phone');
            $table->string('patient_email');
            $table->string('patient_address');
            $table->string('status');
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
        Schema::dropIfExists('hospital_bookings');
    }
}
