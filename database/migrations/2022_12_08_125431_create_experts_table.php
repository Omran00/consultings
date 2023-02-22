<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->unsignedBigInteger('expert_id')->primary();
            $table->foreign('expert_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('image')->nullable();
            $table->string('country', 64);
            $table->string('city' , 85);
            $table->string('street' , 30);
            $table->integer('cost');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('experts');
    }
};
