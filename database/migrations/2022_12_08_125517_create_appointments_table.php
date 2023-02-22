<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('expert_id');
            $table->foreign('expert_id')->references('expert_id')->on('experts')->onUpdate('cascade')->onDelete('cascade');

            $table->tinyInteger('day');
            $table->time('start_time');
            $table->tinyInteger('number_of_hours');

            $table->timestamps();

            $table->index(['day','created_at']);    // composite index for searching two columns together more quickly
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
};
