<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiviewsTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riviews_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('bride_name')->nullable();
            $table->string('groom_name')->nullable();
            $table->string('comment')->nullable();
            $table->string('married')->nullable();
            $table->string('unmarried')->nullable();
            $table->string('image_profile')->nullable();

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
        Schema::dropIfExists('riviews_tbl');
    }
}


   