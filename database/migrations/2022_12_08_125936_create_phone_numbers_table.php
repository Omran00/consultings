<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('phone_numbers', function (Blueprint $table) {

            $table->id('phone_number_id');

            $table->unsignedBigInteger('expert_id');
            $table->foreign('expert_id')->references('expert_id')->on('experts')->onUpdate('cascade')->onDelete('cascade');

            $table->string('phone_number')->unique();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phone_numbers');
    }
};
