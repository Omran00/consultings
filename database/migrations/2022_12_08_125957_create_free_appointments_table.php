<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('free_appointments', function (Blueprint $table) {
            $table->id('free_appointment_id');

            $table->unsignedBigInteger('expert_id');
            $table->foreign('expert_id')->references('expert_id')->on('experts')->onUpdate('cascade')->onDelete('cascade');

            $table->tinyInteger('day')->index();

            // $table->time('start_time');
            // $table->time('end_time');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('free_appointments');
    }
};
