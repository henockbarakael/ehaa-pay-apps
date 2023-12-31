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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_code');
            $table->unsignedBigInteger('customer_id');
            $table->float('balance');
            $table->string('currency');

            $table->foreign('customer_id')->references('id')->on('customers');
            
            $table->timestamps();
            // Ajout de l'index sur la colonne 'account_code'
            $table->index('account_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
