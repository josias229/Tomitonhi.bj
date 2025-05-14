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
        // 12. Blog Articles Table
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artisan_id')->constrained('artisans');
            $table->string('titre');
            $table->string('slug')->unique();
            $table->text('contenu');
            $table->string('image_couverture');
            $table->boolean('est_publie')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_articles');
    }
};
