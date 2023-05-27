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
            $table->string('applicant_id');
            $table->string('allottee_id');

            $table->string('reason')->nullable();
            $table->string('other_reason')->nullable();

            $table->string('kseb_noDues');
            $table->string('kwa_noDues');
            $table->string('occupant_declaration');
            $table->boolean('ri_confirmation')->default(0)->nullable();    
            $table->boolean('unitHead_confirmation')->default(0)->nullable();    
         
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
