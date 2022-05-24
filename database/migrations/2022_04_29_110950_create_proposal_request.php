<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_request', function (Blueprint $table) {
            $table->id();
             $table->string('proposed_by_groom')->nullable()->comment('groom');
            $table->string('proposed_by_bride')->nullable()->comment('Bride');
            $table->string('proposed_by_role')->nullable()->comment('Bride 3; Groom 2');
            $table->string('proposed_to')->nullable()->comment('Groom; Bride');
            $table->string('proposed_to_role')->nullable()->comment('Bride 3; Groom 2');
            $table->string('proposel_status')->nullable();
            
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
        Schema::dropIfExists('proposal_request');
    }
}
