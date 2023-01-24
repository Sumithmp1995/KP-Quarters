<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacattees', function (Blueprint $table) {
            $table->id();
            
            $table->string('user_id');
            $table->string('unitHead_id');
            $table->string('quarters_id');
            $table->string('occupant_id');

            $table->string('reason');
            $table->string('other_reason');

            $table->string('kseb_noDues');
            $table->string('kwa_noDues');
         
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
        Schema::dropIfExists('vacattees');
    }
};
