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
            $table->integer('percentage_clean_water')->default(30);
            $table->integer('percentage_training')->default(30);
            $table->integer('percentage_nutrition')->default(20);
            $table->integer('percentage_environment')->default(12);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transparencies', function (Blueprint $table) {
            $table->dropColumn(['percentage_clean_water', 'percentage_training', 'percentage_nutrition', 'percentage_environment']);
        });
    }
};
