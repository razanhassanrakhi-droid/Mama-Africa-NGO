<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transparencies', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->default('Transparency & Impact');
            $table->string('title_ar')->default('الشفافية والأثر');
            $table->text('desc_en')->nullable();
            $table->text('desc_ar')->nullable();
            $table->string('report_url')->nullable();

            // 6 counters
            foreach (range(1, 6) as $i) {
                $table->unsignedBigInteger("counter{$i}_value")->default(0);
                $table->string("counter{$i}_label_en")->default("Program $i");
                $table->string("counter{$i}_label_ar")->default("برنامج $i");
            }

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transparencies');
    }
};
