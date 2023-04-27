<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->timestamps();

            $table->unsignedBigInteger('property_id')->nullable();
            $table->foreign('property_id')
                ->references('id')
                ->on('properties')
                ->onDelete('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
};
