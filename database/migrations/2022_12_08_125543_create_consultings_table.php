<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('consultings', function (Blueprint $table) {

            $table->id('consulting_id');
            $table->string('consulting_name',30)->index();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultings');
    }
};
