<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    DB::table('produit_photos')
        ->where('url', 'like', 'private/%')
        ->update(['url' => DB::raw("REPLACE(url, 'private/', 'public/')")]);
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
