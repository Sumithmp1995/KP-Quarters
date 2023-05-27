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
        Schema::create('rules_and_regulations', function (Blueprint $table) {
            $table->id();
            $table->string('office_name');
            $table->string('rule_type');   // Circular, Order:BO, DGO, Court Order
            $table->string('rule_name');
            $table->string('rule_no');
            $table->string('rules_doc');
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
        Schema::dropIfExists('rules_and_regulations');
    }
};
