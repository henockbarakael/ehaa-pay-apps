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
        Schema::create('ehaa_pay_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('account_code');
            $table->unsignedBigInteger('customer_id');
            $table->float('balance');
            $table->string('currency');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ehaa_pay_accounts');
    }
};
