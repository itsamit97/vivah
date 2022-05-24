<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecentlyViewProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recently_view_profile', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_user_id')->nullable()->comment('Who View Profile');
            $table->string('visitor_role')->nullable();
            $table->string('visited_id')->nullable()->comment('Bride & groom Id');
            $table->string('visited_role')->nullable()->comment('2 Groom; 3:Bride');
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
        Schema::dropIfExists('recently_view_profile');
    }
}

