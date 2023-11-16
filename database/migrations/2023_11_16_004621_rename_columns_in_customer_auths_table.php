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
        Schema::table('customer_auths', function (Blueprint $table) {
            $table->renameColumn('username', 'client_id');
            $table->renameColumn('password', 'client_secret');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_auths', function (Blueprint $table) {
            $table->renameColumn('client_id', 'username');
            $table->renameColumn('client_secret', 'password');
        });
    }
};
