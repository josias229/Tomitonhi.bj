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
        // 5. Produit Photos Table
        Schema::create('produit_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produit_id')->constrained()->cascadeOnDelete();
            $table->string('url');
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_photos');
    }
};
