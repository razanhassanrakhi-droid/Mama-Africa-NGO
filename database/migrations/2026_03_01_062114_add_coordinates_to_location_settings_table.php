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
        Schema::table('location_settings', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)->nullable()->after('name_en');
            $table->decimal('longitude', 11, 8)->nullable()->after('latitude');
            if (Schema::hasColumn('location_settings', 'map_embed_url')) {
                $table->dropColumn('map_embed_url');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location_settings', function (Blueprint $table) {
            $table->dropColumn(['latitude', 'longitude']);
            $table->text('map_embed_url')->nullable();
        });
    }
};
