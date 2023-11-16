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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('recipient_account_id')->nullable();
            $table->string('transaction_type');
            $table->float('amount');
            $table->string('currency');
            $table->string('reference');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('customers');
            $table->foreign('recipient_account_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
