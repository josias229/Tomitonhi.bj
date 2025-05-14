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
        // 7. Sous Commandes Table
        Schema::create('sous_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('commande_id')->constrained()->cascadeOnDelete();
            $table->foreignId('artisan_id')->constrained('artisans');
            $table->decimal('montant', 10, 2);
            $table->enum('statut', ['en_preparation', 'expediee', 'livree', 'retournee']);
            $table->string('numero_suivi')->nullable();
            $table->text('notes_livraison')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sous_commandes');
    }
};
