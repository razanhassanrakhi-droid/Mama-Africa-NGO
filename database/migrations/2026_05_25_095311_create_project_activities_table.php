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
        Schema::create('project_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects')->onDelete('cascade');
            $table->text('title'); // JSON translatable
            $table->text('description'); // JSON translatable
            $table->text('detail')->nullable(); // JSON translatable
            $table->text('location')->nullable(); // JSON translatable
            $table->text('date')->nullable(); // JSON translatable
            $table->text('funded_by')->nullable(); // JSON translatable
            $table->string('amount')->nullable();
            $table->text('status')->nullable(); // JSON translatable
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_activities');
    }
};
