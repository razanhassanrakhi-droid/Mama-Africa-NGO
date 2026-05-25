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
        $tablesToFix = [
            'abouts',
            'beneficiaries',
            'contacts',
            'heroes',
            'legal_contents',
            'team_settings',
            'transparencies',
            'failed_jobs',
            'jobs'
        ];

        foreach ($tablesToFix as $table) {
            if (Schema::hasTable($table)) {
                try {
                    // 1. Add Primary Key if missing
                    try {
                        DB::statement("ALTER TABLE `{$table}` ADD PRIMARY KEY (`id`);");
                    } catch (\Exception $e) {
                        // Likely already a primary key or column missing
                    }

                    // 2. Modify to AUTO_INCREMENT
                    DB::statement("ALTER TABLE `{$table}` MODIFY `id` BIGINT UNSIGNED AUTO_INCREMENT;");
                } catch (\Exception $e) {
                    // Log or ignore
                }
            }
        }

        // Special case for sessions table if it exists and lacks a primary key
        if (Schema::hasTable('sessions')) {
            try {
                DB::statement("ALTER TABLE `sessions` ADD PRIMARY KEY (`id`);");
            } catch (\Exception $e) {
                // Ignore
            }
        }
        
        // Special case for cache table if it exists and lacks a primary key
        if (Schema::hasTable('cache')) {
            try {
                DB::statement("ALTER TABLE `cache` ADD PRIMARY KEY (`key`);");
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
        // Safety: Do not easily remove PK/AI in down()
    }
};
