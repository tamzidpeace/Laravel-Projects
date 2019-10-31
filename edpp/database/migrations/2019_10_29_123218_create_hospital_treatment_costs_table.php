<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalTreatmentCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_treatment_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('hospital_booking_id')->unsigned()->unique();
            $table->string('patient_name');
            $table->integer('contact_num');
            $table->string('admit_date');
            $table->string('release_date');
            $table->integer('seat');
            $table->integer('medicine')->nullable();
            $table->integer('test')->nullable();
            $table->integer('operation')->nullable();
            $table->integer('others')->nullable();
            $table->integer('total')->nullable();
            $table->text('file');
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
        Schema::dropIfExists('hospital_treatment_costs');
    }
}
