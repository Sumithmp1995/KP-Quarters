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
        Schema::create('unit_heads', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('mother_unit');
            $table->string('unitHead_pen');
            $table->string('unit_address');
            $table->string('tel_no');
            $table->string('unitHead_name');
            $table->string('desig');
            $table->string('unitHead_mob');
            $table->string('unit_email');
          
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
        Schema::dropIfExists('unit_heads');
    }
};
