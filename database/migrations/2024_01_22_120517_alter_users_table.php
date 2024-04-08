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
        Schema::table('users', function (Blueprint $table) { 
            $table->enum('status',['active','inactive',])->default('inactive')->change();
            $table->enum('approve',['yes','no',])->default('no');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->$table->dropColumn('status');
            $table->$table->dropColumn('approve');
            
        });
    }
};
