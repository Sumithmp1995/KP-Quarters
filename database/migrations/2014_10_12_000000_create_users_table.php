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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->integer('pen')->unique();
            $table->timestamp('pen_verified_at')->nullable();
            $table->string('password');
            $table->string('mother_unit');
            $table->string('present_unit')->nullable();
            $table->smallInteger('unitHead_id')->nullable();
            $table->tinyInteger('role')->default(1);
            $table->boolean('applied')->default(0);
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
};
