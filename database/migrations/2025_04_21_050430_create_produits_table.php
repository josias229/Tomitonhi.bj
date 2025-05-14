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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artisan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('categorie_id')->constrained();
            $table->string('nom');
            $table->text('description');
            $table->decimal('prix', 10, 2);
            $table->decimal('prix_promo', 10, 2)->nullable();
            $table->date('debut_promo')->nullable();
            $table->date('fin_promo')->nullable();
            $table->integer('stock')->default(0);
            $table->string('slug')->unique();
            $table->boolean('est_actif')->default(true);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['artisan_id', 'categorie_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
