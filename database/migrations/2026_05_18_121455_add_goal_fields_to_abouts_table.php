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
        Schema::table('abouts', function (Blueprint $table) {
            $table->string('goal_title_ar')->nullable();
            $table->string('goal_title_en')->nullable();
            $table->text('goal_desc_ar')->nullable();
            $table->text('goal_desc_en')->nullable();
            $table->string('goal_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->dropColumn(['goal_title_ar', 'goal_title_en', 'goal_desc_ar', 'goal_desc_en', 'goal_image']);
        });
    }
};
