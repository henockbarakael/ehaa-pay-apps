<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('freshpay_callbacks', function (Blueprint $table) {
            $table->id();
            $table->string('customer_details')->nullable();
            $table->string('ehaa_reference')->nullable();
            $table->integer('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('action')->nullable();
            $table->string('method')->nullable();
            $table->string('paydrc_reference')->nullable();
            $table->string('telco_reference')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freshpay_callbacks');
    }
};
