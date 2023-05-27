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
        Schema::create('asset_registers', function (Blueprint $table) {
            $table->id();
            $table->string('unitHead_id');
            $table->string('quarters_id');
            $table->string('asset_name');
            $table->string('asset_type');
            $table->string('count');
            $table->string('remark');
            $table->string('user_confirmation')->nullable(); 
            $table->string('ri_confirmation')->nullable(); 
            $table->string('dueDetails')->nullable(); 
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
        Schema::dropIfExists('asset_registers');
    }
};
