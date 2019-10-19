<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->string('id');
            $table->string('name');
            $table->string('type');
            $table->string('course')->nullable();
            $table->string('skill')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('description')->nullable();
            $table->string('status_update')->nullable();
            $table->string('adress')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
