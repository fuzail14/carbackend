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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('company_id');
            $table->string('company_name');
            $table->string('sum_insured');
            $table->string('model_year');
            $table->string('make');
            $table->string('model');
            $table->string('first_registration_date');
            $table->string('premium_price');
            $table->string('motor_name');
            $table->string('plate_number');
            $table->string('expiry_date');
            $table->string('total_premium_price');
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
        Schema::dropIfExists('quotes');
    }
};
