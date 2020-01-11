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
            $table->string('id')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('ext_name')->nullable();
            $table->string('title')->nullable();
            $table->string('company_name')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('type')->nullable();
            $table->string('field')->nullable();
            $table->string('area')->nullable();
            $table->string('description')->nullable();
            $table->string('status_update')->nullable();
            $table->string('approval_status')->default('0');
            $table->string('hire_status')->default('0');
            $table->string('adress')->nullable();
            $table->string('company_rep')->nullable();
            $table->string('number')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('years_exp')->nullable();
            $table->string('status_edu')->default('0');
            $table->string('status_skills')->default('0');
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
