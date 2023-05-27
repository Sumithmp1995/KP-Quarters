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
        Schema::create('mother_units', function (Blueprint $table) {
            $table->id();
            $table->string('mother_unit');
            $table->string('unitHead_id')->nullable();
      
            $table->string('lsq_quarters_count')->default('0');
            $table->string('usq_quarters_count')->default('0');

            $table->string('executive_ls_count')->default('0');
            $table->string('ministerial_ls_count')->default('0');

            $table->string('executive_us_count')->default('0');
            $table->string('ministerial_us_count')->default('0');

            $table->integer('executive_ls_allotted_count')->default(0);
            $table->integer('ministerial_ls_allotted_count')->default(0);

            $table->integer('executive_us_allotted_count')->default(0);
            $table->integer('ministerial_us_allotted_count')->default(0);

            $table->integer('special_reservations')->default(0);
            
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
        Schema::dropIfExists('mother_units');
    }
};
