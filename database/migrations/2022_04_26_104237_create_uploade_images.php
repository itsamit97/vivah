<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadeImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded', function (Blueprint $table) {
            $table->id();

            $table->string('bride_groom_profile_id')->nullable();
            $table->string('user_tbl_id')->nullable();
            $table->string('bride_groom_profile_role')->nullable()->comment('2 Groom; 3:Bride');
          
            $table->string('first_name')->nullable()->comment('Bride & groom ');
            $table->string('last_name')->nullable()->comment('Bride & groom ');
            $table->string('profile_image')->nullable();
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
        Schema::dropIfExists('uploaded');
    }
}

