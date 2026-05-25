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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();

            $table->string('iban');                 // رقم الايبان
            $table->foreignId('project_id')         // المشروع المتبرع له
                  ->constrained('projects')
                  ->cascadeOnDelete();

            $table->string('donor_name');           // اسم المتبرع
            $table->decimal('amount', 10, 2);       // المبلغ

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
