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
            $table->boolean('show_counter_values')->default(true)->after('desc_ar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transparencies', function (Blueprint $table) {
            $table->dropColumn('show_counter_values');
        });
    }
};
