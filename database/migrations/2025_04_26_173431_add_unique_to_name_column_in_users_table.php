<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unique('name')->nullable(false);
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropUnique(['name']);
        // });
        Schema::table('users', function (Blueprint $table) {
            $table->unique('name', 'another_unique_index_name');
        });
        
    }
};
