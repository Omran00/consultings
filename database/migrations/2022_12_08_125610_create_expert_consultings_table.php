<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('expert_consultings', function (Blueprint $table) {


            $table->id('expert_consulting_id');

            $table->unsignedBigInteger('expert_id');
            $table->foreign('expert_id')->references('expert_id')->on('experts')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('consulting_id');
            $table->foreign('consulting_id')->references('consulting_id')->on('consultings')->onUpdate('cascade')->onDelete('cascade');

          
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('expert_consultings');
    }
};
