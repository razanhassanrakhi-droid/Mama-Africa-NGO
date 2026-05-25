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
        Schema::table('transparencies', function (Blueprint $table) {
            // Financial Distribution
            $table->integer('financial_programs')->default(85);
            $table->integer('financial_operations')->default(10);
            $table->integer('financial_admin')->default(5);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transparencies', function (Blueprint $table) {
            //
        });
    }
};
