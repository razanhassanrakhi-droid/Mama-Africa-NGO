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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->string('cleanwater_value')->nullable();
            $table->string('cleanwater_text_ar')->nullable();
            $table->string('cleanwater_text_en')->nullable();

            $table->string('education_value')->nullable();
            $table->string('education_text_ar')->nullable();
            $table->string('education_text_en')->nullable();

            $table->string('villages_value')->nullable();
            $table->string('villages_text_ar')->nullable();
            $table->string('villages_text_en')->nullable();

            $table->string('funds_value')->nullable();
            $table->string('funds_text_ar')->nullable();
            $table->string('funds_text_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};
