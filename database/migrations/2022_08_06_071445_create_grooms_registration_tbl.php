<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroomsRegistrationTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grooms_registration_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('gender_tbl_id')->nullable()->comment('Registration For male && femaile ');
            $table->string('registration_by_tbl_id')->nullable()->comment('who create reg');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable()->comment('bcrypt pass');
            $table->string('show_password')->nullable();
            $table->string('role')->nullable()->comment('2 groom');
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
        Schema::dropIfExists('grooms_registration_tbl');
    }
}


