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
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->id();
            
            // Hero Section
            $table->text('hero_title_ar')->nullable();
            $table->text('hero_title_en')->nullable();
            $table->text('hero_subtitle_ar')->nullable();
            $table->text('hero_subtitle_en')->nullable();
            $table->text('hero_pill1_icon')->nullable();
            $table->text('hero_pill1_text_ar')->nullable();
            $table->text('hero_pill1_text_en')->nullable();
            $table->text('hero_pill2_icon')->nullable();
            $table->text('hero_pill2_text_ar')->nullable();
            $table->text('hero_pill2_text_en')->nullable();
            $table->text('hero_pill3_icon')->nullable();
            $table->text('hero_pill3_text_ar')->nullable();
            $table->text('hero_pill3_text_en')->nullable();

            // Objectives Section
            $table->text('objectives_title_ar')->nullable();
            $table->text('objectives_title_en')->nullable();

            // Timeline Section
            $table->text('timeline_title_ar')->nullable();
            $table->text('timeline_title_en')->nullable();

            // Journey Section
            $table->text('journey_title_ar')->nullable();
            $table->text('journey_title_en')->nullable();
            $table->text('journey_pos_title_ar')->nullable();
            $table->text('journey_pos_title_en')->nullable();
            $table->text('journey_pos_desc_ar')->nullable();
            $table->text('journey_pos_desc_en')->nullable();
            $table->text('journey_pos_pill_icon')->nullable();
            $table->text('journey_pos_pill_ar')->nullable();
            $table->text('journey_pos_pill_en')->nullable();
            $table->text('journey_neg_title_ar')->nullable();
            $table->text('journey_neg_title_en')->nullable();
            $table->text('journey_neg_desc_ar')->nullable();
            $table->text('journey_neg_desc_en')->nullable();

            // Capacity Section
            $table->text('capacity_title_ar')->nullable();
            $table->text('capacity_title_en')->nullable();
            $table->text('capacity_desc_ar')->nullable();
            $table->text('capacity_desc_en')->nullable();
            $table->text('capacity_summary_title_ar')->nullable();
            $table->text('capacity_summary_title_en')->nullable();
            $table->text('capacity_summary_desc_ar')->nullable();
            $table->text('capacity_summary_desc_en')->nullable();
            $table->text('capacity_internal_title_ar')->nullable();
            $table->text('capacity_internal_title_en')->nullable();
            $table->text('capacity_external_title_ar')->nullable();
            $table->text('capacity_external_title_en')->nullable();

            // Snapshot Section
            $table->text('snapshot_title_ar')->nullable();
            $table->text('snapshot_title_en')->nullable();

            // SWOT Section
            $table->text('swot_title_ar')->nullable();
            $table->text('swot_title_en')->nullable();
            $table->text('swot_strengths_title_ar')->nullable();
            $table->text('swot_strengths_title_en')->nullable();
            $table->text('swot_strengths_icon')->nullable();
            $table->text('swot_weaknesses_title_ar')->nullable();
            $table->text('swot_weaknesses_title_en')->nullable();
            $table->text('swot_weaknesses_icon')->nullable();
            $table->text('swot_opportunities_title_ar')->nullable();
            $table->text('swot_opportunities_title_en')->nullable();
            $table->text('swot_opportunities_icon')->nullable();
            $table->text('swot_needs_title_ar')->nullable();
            $table->text('swot_needs_title_en')->nullable();
            $table->text('swot_needs_icon')->nullable();

            // Methodology Section
            $table->text('methodology_title_ar')->nullable();
            $table->text('methodology_title_en')->nullable();
            $table->text('methodology_subtitle_ar')->nullable();
            $table->text('methodology_subtitle_en')->nullable();
            $table->text('methodology_grants_title_ar')->nullable();
            $table->text('methodology_grants_title_en')->nullable();
            $table->text('methodology_grants_icon')->nullable();
            $table->text('methodology_me_title_ar')->nullable();
            $table->text('methodology_me_title_en')->nullable();
            $table->text('methodology_me_icon')->nullable();
            $table->text('methodology_cross_title_ar')->nullable();
            $table->text('methodology_cross_title_en')->nullable();
            $table->text('methodology_cross_desc_ar')->nullable();
            $table->text('methodology_cross_desc_en')->nullable();

            // Who We Serve Section
            $table->text('serve_title_ar')->nullable();
            $table->text('serve_title_en')->nullable();
            $table->text('serve_subtitle_ar')->nullable();
            $table->text('serve_subtitle_en')->nullable();
            $table->text('serve_desc_ar')->nullable();
            $table->text('serve_desc_en')->nullable();

            // Contact Person Section
            $table->text('contact_title_ar')->nullable();
            $table->text('contact_title_en')->nullable();
            $table->text('contact_subtitle_ar')->nullable();
            $table->text('contact_subtitle_en')->nullable();
            $table->text('contact_desc_ar')->nullable();
            $table->text('contact_desc_en')->nullable();
            $table->text('contact_name_ar')->nullable();
            $table->text('contact_name_en')->nullable();
            $table->text('contact_position_ar')->nullable();
            $table->text('contact_position_en')->nullable();
            $table->text('contact_email')->nullable();
            $table->text('contact_phone')->nullable();

            $table->timestamps();
        });

        Schema::create('profile_items', function (Blueprint $table) {
            $table->id();
            $table->text('type'); // objective, timeline, snapshot, swot_strength, etc.
            $table->text('icon')->nullable();
            $table->text('title_ar')->nullable();
            $table->text('title_en')->nullable();
            $table->text('value_ar')->nullable();
            $table->text('value_en')->nullable();
            $table->text('extra_value_ar')->nullable(); // date or status
            $table->text('extra_value_en')->nullable(); // date or status
            $table->integer('number_value')->nullable(); // for progress bar percentage
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_items');
        Schema::dropIfExists('profile_settings');
    }
};
