<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique()->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('show_password')->nullable();
            $table->string('reg_groom_tbl_id')->nullable();
            $table->string('reg_bride_tbl_id')->nullable();
            $table->string('role')->nullable()->comment('1 SuperAdmin, 2 Groom, 3 Bride' );
            $table->string('bride_profile_id')->nullable();
             $table->string('groom_profile_id')->nullable();


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}



