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
        Schema::create('occupants', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('applicant_name');
            $table->string('allottee_id');
            $table->string('application_no');
            $table->string('unitHead_id');
            $table->string('quarters_id');

            $table->string('proceedings_no')->nullable();
            $table->string('proceedings_doc')->nullable();
            $table->string('occupant_status')->default('1')->nullable();    // for Vacated
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
        Schema::dropIfExists('occupants');
    }
};
