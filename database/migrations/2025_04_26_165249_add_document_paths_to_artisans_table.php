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
        Schema::table('artisans', function (Blueprint $table) {
            $table->string('cni_path')->nullable()->after('galerie_photos');
            $table->string('rccm_path')->nullable()->after('cni_path');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('artisans', function (Blueprint $table) {
            $table->dropColumn(['cni_path', 'rccm_path']);
        });
    }
};
