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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('sender_name')->nullable()->after('id');
            $table->string('sender_phone')->nullable()->after('sender_name');
            $table->string('receiver_name')->nullable()->after('sender_phone');
            $table->string('receiver_phone')->nullable()->after('receiver_name');
            $table->string('status')->nullable()->after('reference');
            $table->string('description')->nullable()->after('status');
            $table->string('extenal_reference')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
