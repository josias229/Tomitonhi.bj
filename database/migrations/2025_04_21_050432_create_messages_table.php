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
        // 11. Messages Table
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('envoyeur_id')->constrained('users');
            $table->foreignId('receveur_id')->constrained('users');
            $table->text('contenu');
            $table->boolean('lu')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
