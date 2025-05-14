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
        // 3. Artisans Table
        Schema::create('artisans', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('categorie_id')->nullable()->constrained();
            $table->string('rccm')->unique();
            $table->string('ifu')->nullable()->unique();
            $table->text('description');
            $table->float('note_moyenne')->default(0);
            $table->string('photo_profil')->nullable();
            $table->text('galerie_photos')->nullable();
            $table->boolean('est_verifie')->default(false);
            $table->timestamp('verifie_le')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artisans');
    }
};
