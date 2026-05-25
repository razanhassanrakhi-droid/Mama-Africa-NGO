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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('vision_title_ar')->nullable();
            $table->string('vision_title_en')->nullable();
            $table->text('vision_desc_ar')->nullable();
            $table->text('vision_desc_en')->nullable();
            $table->string('vision_image')->nullable();

            $table->string('value_title_ar')->nullable();
            $table->string('value_title_en')->nullable();
            
            $table->string('value_participation_ar')->nullable();
            $table->string('value_participation_en')->nullable();
            $table->text('value_participation_desc_ar')->nullable();
            $table->text('value_participation_desc_en')->nullable();

            $table->string('value_integrity_ar')->nullable();
            $table->string('value_integrity_en')->nullable();
            $table->text('value_integrity_desc_ar')->nullable();
            $table->text('value_integrity_desc_en')->nullable();

            $table->string('value_transparency_ar')->nullable();
            $table->string('value_transparency_en')->nullable();
            $table->text('value_transparency_desc_ar')->nullable();
            $table->text('value_transparency_desc_en')->nullable();

            $table->string('value_accountability_ar')->nullable();
            $table->string('value_accountability_en')->nullable();
            $table->text('value_accountability_desc_ar')->nullable();
            $table->text('value_accountability_desc_en')->nullable();

            $table->string('mission_title_ar')->nullable();
            $table->string('mission_title_en')->nullable();
            $table->text('mission_desc_ar')->nullable();
            $table->text('mission_desc_en')->nullable();
            $table->string('mission_image')->nullable();

            $table->string('history_title_ar')->nullable();
            $table->string('history_title_en')->nullable();
            $table->text('history_desc_ar')->nullable();
            $table->text('history_desc_en')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
