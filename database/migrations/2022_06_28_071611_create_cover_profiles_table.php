<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoverProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('bride_groom_profile_id')->nullable();
            $table->string('bride_groom_profile_role')->nullable()->comment('2 Groom; 3:Bride');
            $table->string('cover_profile')->nullable();

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
        Schema::dropIfExists('cover_profiles');
    }
}
