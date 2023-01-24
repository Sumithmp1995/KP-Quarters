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
        Schema::create('applicants', function (Blueprint $table) {
            
            $table->id();
            $table->string('user_id');
            $table->string('application_no');

            $table->string('photo');
            $table->string('applicant_name');
            $table->integer('pen');
        
            $table->string('applicant_type');
            $table->string('rank');
            $table->string('gl_no')->nullable();
            $table->float('pay');
            $table->string('scale_of_pay');

            $table->string('mother_unit');
            $table->string('present_unit');

            $table->string('working_status');
            $table->string('working_status_doc')->default('not applicable');
          
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->date('date_of_superannuation');

            $table->string('house_name');
            $table->string('street_name');
            $table->string('post_office');
            $table->string('pin_code');

            $table->string('village');
            $table->string('taluk');
            $table->string('district');

            $table->string('marital_status');
            $table->boolean('partner_employee');
            $table->boolean('radius_five_miles');

            $table->string('marriage_certificate');
            $table->string('mob'); 
            $table->boolean('declaration');
        
            $table->boolean('approval')->default('0');  // user not approved
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
        Schema::dropIfExists('applicants');
    }
};
