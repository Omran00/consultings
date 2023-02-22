<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rates', function (Blueprint $table)
        {

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('expert_consulting_id');
            $table->foreign('expert_consulting_id')->references('expert_consulting_id')->on('expert_consultings')->onUpdate('cascade')->onDelete('cascade');

            $table->double('rate')->default(1);

            $table->timestamps();
        });
    }



    public function down()
    {
        Schema::dropIfExists('rates');
    }
};
