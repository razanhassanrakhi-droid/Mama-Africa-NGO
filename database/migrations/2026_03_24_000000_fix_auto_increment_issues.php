<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix for inquiries table
        try {
            DB::statement("ALTER TABLE inquiries MODIFY id BIGINT UNSIGNED AUTO_INCREMENT;");
        } catch (\Exception $e) {
            // Log or ignore if already fixed
        }
        
        // Fix for payment_methods table
        if (Schema::hasTable('payment_methods')) {
            try {
                DB::statement("ALTER TABLE payment_methods MODIFY id BIGINT UNSIGNED AUTO_INCREMENT;");
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
        //
    }
};
