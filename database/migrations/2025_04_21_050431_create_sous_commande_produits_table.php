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
        Schema::create('sous_commande_produits', function (Blueprint $table) {
            $table->foreignId('sous_commande_id')->constrained()->cascadeOnDelete();
            $table->foreignId('produit_id')->constrained()->onUpdate('cascade');
            $table->integer('quantite');
            $table->decimal('prix_unitaire', 10, 2);
            $table->primary(['sous_commande_id', 'produit_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_commande_produits');
    }
};
