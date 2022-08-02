<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatnerPreferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patner_preference', function (Blueprint $table) {
            $table->id();

             $table->string('bride_groom_id')->nullable();
            $table->string('bride_groom_role')->nullable();
            $table->string('age')->nullable();
            $table->string('marital_status_id')->nullable();
            $table->string('complexion')->nullable();
            $table->string('height')->nullable();
            $table->string('cast')->nullable();
            $table->string('state_id')->nullable();
            $table->string('religion_id')->nullable();

            $table->string('education')->nullable();
            $table->string('occupation')->nullable();

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
        Schema::dropIfExists('patner_preference');
    }
}

