<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

        $table->id('user_id');

        $table->string('first_name',30)->index();

        $table->string('last_name',30)->index();

        $table->string('email');

        $table->string('password');

        $table->boolean('is_expert');


        $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
