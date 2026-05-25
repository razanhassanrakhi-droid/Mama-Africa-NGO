<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Fix location_settings id column — make it AUTO_INCREMENT
        if (Schema::hasTable('location_settings')) {
            try {
                DB::statement("ALTER TABLE `location_settings` MODIFY `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT;");
            } catch (\Exception $e) {
                // already fixed or different structure
            }
        }
    }

    public function down(): void
    {
        //
    }
};
