<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_details', function (Blueprint $table) {
            $table->id();
            $table->string('bride_groom_id')->nullable();
            $table->string('bride_groom_role')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('family_member')->nullable();
            $table->string('family_income')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city')->nullable();

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
        Schema::dropIfExists('family_details');
    }
}




