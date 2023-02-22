<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('free_times', function (Blueprint $table) {
            $table->id('free_time_id');
            
            $table->unsignedBigInteger('free_appointment_id');
            $table->foreign('free_appointment_id')->references('free_appointment_id')->on('free_appointments')->onUpdate('cascade')->onDelete('cascade');

            $table->time('start_time');
            $table->time('end_time');
            
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
        Schema::dropIfExists('free_times');
    }
};
