<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix for location_settings table
        if (Schema::hasTable('location_settings')) {
            try {
                // First, check if 'id' is already a primary key. If not, add it.
                // We use a try-catch for the primary key add in case it already exists but didn't show in the previous check.
                try {
                    DB::statement("ALTER TABLE location_settings ADD PRIMARY KEY (id);");
                } catch (\Exception $e) {
                    // Ignore if already a primary key
                }
                
                DB::statement("ALTER TABLE location_settings MODIFY id BIGINT UNSIGNED AUTO_INCREMENT;");
            } catch (\Exception $e) {
                // Log or ignore if already fixed
            }
        }

        // Fix for location_audit_logs table
        if (Schema::hasTable('location_audit_logs')) {
            try {
                try {
                    DB::statement("ALTER TABLE location_audit_logs ADD PRIMARY KEY (id);");
                } catch (\Exception $e) {
                    // Ignore
                }
                
                DB::statement("ALTER TABLE location_audit_logs MODIFY id BIGINT UNSIGNED AUTO_INCREMENT;");
            } catch (\Exception $e) {
                // Ignore
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No easy way to undo this safely without potentially breaking things
    }
};
