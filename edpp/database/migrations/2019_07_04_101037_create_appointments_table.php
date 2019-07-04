<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('working_state_id');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->integer('hospital_id');
            $table->integer('day_id');
            $table->string('patient_name');
            $table->string('patient_sex');
            $table->string('patient_email');
            $table->string('patient_blood_group');
            $table->integer('patient_age');
            $table->integer('patient_phone');
            $table->string('period');
            $table->string('date');
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
        Schema::dropIfExists('appointments');
    }
}
