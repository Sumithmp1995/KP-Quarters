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
        Schema::create('ris', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('unitHead_id')->nullable();
            $table->smallInteger('user_id')->nullable();
            $table->string('RiName');
            $table->string('desig');
            $table->integer('riPen')->unique();
            $table->string('mother_unit');
            $table->string('unit_address');
            $table->string('ri_teleNo');
            $table->string('ri_mob');
            $table->string('ri_email');
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
        Schema::dropIfExists('ris');
    }
};
