<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('legal_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page_type')->unique(); // 'privacy' or 'terms'
            
            // Header
            $table->string('title_ar')->nullable();
            $table->string('title_en')->nullable();
            $table->text('intro_ar')->nullable();
            $table->text('intro_en')->nullable();
            
            // Sections (Storing as JSON for flexibility, or flat fields if preferred)
            // Given the complexity of sections, let's use flat fields for now for simplicity in forms
            
            // Privacy sections
            $table->text('privacy_intro_long_ar')->nullable();
            $table->text('privacy_intro_long_en')->nullable();
            
            // Section 1: Info Collection
            $table->string('s1_title_ar')->nullable();
            $table->string('s1_title_en')->nullable();
            $table->text('s1_content_ar')->nullable();
            $table->text('s1_content_en')->nullable();
            
            // Section 2: Use Info
            $table->string('s2_title_ar')->nullable();
            $table->string('s2_title_en')->nullable();
            $table->text('s2_content_ar')->nullable();
            $table->text('s2_content_en')->nullable();
            
            // Section 3: Data Security
            $table->string('s3_title_ar')->nullable();
            $table->string('s3_title_en')->nullable();
            $table->text('s3_content_ar')->nullable();
            $table->text('s3_content_en')->nullable();
            
            // Section 4: Third Party
            $table->string('s4_title_ar')->nullable();
            $table->string('s4_title_en')->nullable();
            $table->text('s4_content_ar')->nullable();
            $table->text('s4_content_en')->nullable();
            
            // Section 5: Cookies
            $table->string('s5_title_ar')->nullable();
            $table->string('s5_title_en')->nullable();
            $table->text('s5_content_ar')->nullable();
            $table->text('s5_content_en')->nullable();
            
            // Section 6: Contact Us (or LL for Terms)
            $table->string('s6_title_ar')->nullable();
            $table->string('s6_title_en')->nullable();
            $table->text('s6_content_ar')->nullable();
            $table->text('s6_content_en')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('legal_contents');
    }
};
