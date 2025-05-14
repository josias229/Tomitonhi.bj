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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
        
            // Remplace nom et prénom par name
            $table->string('name')->unique()->nullable(false);
        
            $table->string('email')->unique();
            $table->string('password');
        
            // Champs supplémentaires
            $table->string('telephone')->nullable()->unique();
            $table->string('whatsapp')->nullable();
            $table->text('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->enum('type_compte', ['particulier', 'professionnel'])->default('particulier');
        
            // Champs existants
            $table->enum('role', ['client', 'artisan', 'admin'])->default('client');
            $table->enum('statut', ['actif', 'en_attente', 'bloque'])->default('actif');
            
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
