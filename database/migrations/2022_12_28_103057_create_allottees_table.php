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
        Schema::create('allottees', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('unitHead_id')->nullable();
            $table->string('applicant_name');
            $table->string('applicant_type');
            $table->string('application_no');
            $table->string('applicant_id');
            $table->string('type')->nullable();
            $table->string('willingness')->nullable();
            $table->string('quarters_id')->nullable();
            $table->integer('seniority_no')->default(0)->nullable();
            $table->string('status')->default('active')->nullable();  // user not allotted quarters   else status UPDATED as 'vacated'
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
        Schema::dropIfExists('allottees');
    }
};
