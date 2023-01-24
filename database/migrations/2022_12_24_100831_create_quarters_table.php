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
        Schema::create('quarters', function (Blueprint $table) {
            $table->id();
            $table->integer('unitHead_id');
            $table->string('class');
            $table->string('type');
            $table->string('quarters_name');
            $table->string('quarters_no');
            $table->string('unit_name');
            $table->string('allottee_id')->nullable();
            $table->string('status')->default(0)->nullable();
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
        Schema::dropIfExists('quarters');
    }
};
