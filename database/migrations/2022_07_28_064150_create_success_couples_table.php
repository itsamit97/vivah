<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessCouplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_couples', function (Blueprint $table) {
            $table->id();
            $table->string('success_couple')->nullable();
            $table->string('bride_name')->nullable();
            $table->string('groom_name')->nullable();
            $table->string('wedding_year')->nullable();
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
        Schema::dropIfExists('success_couples');
    }
}
