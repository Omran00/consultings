<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('favorite_experts', function (Blueprint $table) {
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
      
            $table->unsignedBigInteger('expert_id');
            $table->foreign('expert_id')->references('expert_id')->on('experts')->onUpdate('cascade')->onDelete('cascade');
      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('favorite_experts');
    }
};
