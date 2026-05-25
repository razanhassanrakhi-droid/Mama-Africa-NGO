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
        $locations = \DB::table('location_settings')->whereNotNull('audit_pdf')->get();

        foreach ($locations as $location) {
            \DB::table('location_audit_logs')->insert([
                'location_setting_id' => $location->id,
                'file_path' => $location->audit_pdf,
                'start_date' => $location->start_date,
                'end_date' => $location->end_date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \DB::table('location_audit_logs')->truncate();
    }
};
