<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->unsignedBigInteger('wallet_id')->primary();
            $table->foreign('wallet_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->double('balance')->default(10000);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
};
