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
        Schema::table('heroes', function (Blueprint $table) {
            $table->string('org_name_ar')->nullable();
            $table->string('org_name_en')->nullable();
            $table->string('tagline_ar')->nullable();
            $table->string('tagline_en')->nullable();
            $table->string('logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('heroes', function (Blueprint $table) {
            $table->dropColumn(['org_name_ar', 'org_name_en', 'tagline_ar', 'tagline_en', 'logo']);
        });
    }
};
