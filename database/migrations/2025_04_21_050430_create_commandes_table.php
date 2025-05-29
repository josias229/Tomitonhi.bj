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
        // 6. Commandes Table
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->cascadeOnDelete();
            $table->decimal('montant_total', 10, 2);
            $table->enum('statut', ['payee', 'annulee', 'livree', 'retournee', 'en_attente'])->default('en_attente');            $table->string('reference_paiement')->unique()->nullable();
            $table->enum('mode_paiement', ['mobile_money', 'carte', 'espece'])->nullable();
            $table->text('adresse_livraison')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
