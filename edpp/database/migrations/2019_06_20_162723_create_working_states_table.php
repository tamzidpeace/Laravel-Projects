<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_states', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id');
            $table->integer('hospital_id');
            $table->integer('day_id');
            $table->string('morning')->nullable();
            $table->integer('m_visit_amount')->nullable();
            $table->integer('m_visit_amount_b')->default('0');
            $table->string('afternoon')->nullable();
            $table->integer('a_visit_amount')->nullable();
            $table->integer('a_visit_amount_b')->default('0');
            $table->string('evening')->nullable();
            $table->integer('e_visit_amount')->nullable();
            $table->integer('e_visit_amount_b')->default('0');
            $table->unique(['doctor_id', 'hospital_id', 'day_id']);
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
        Schema::dropIfExists('working_states');
    }
}
