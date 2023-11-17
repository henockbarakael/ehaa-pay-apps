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
            // Ajouter une nouvelle colonne "client_id"
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            // Supprimer l'ancienne colonne "client_id"
            $table->dropColumn('username');
            $table->dropColumn('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_auths', function (Blueprint $table) {
            // Ajouter une nouvelle colonne "mode_administration"
            $table->string('username');
            $table->string('password');
            // Supprimer la nouvelle colonne "mode_administration_id"
            $table->dropColumn('client_id');
            $table->dropColumn('client_secret');
        });
    }
};
