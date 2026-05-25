<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('news', function (Blueprint $table) {
        $table->id(); // رقم تلقائي لكل خبر

        $table->string('title'); // عنوان الخبر
        $table->text('details'); // تفاصيل الخبر
        $table->string('image')->nullable(); // صورة الخبر (اختياري)
                $table->text('pay')->nullable(); // تفاصيل الخبر

        $table->foreignId('project_id')->constrained()->onDelete('cascade');
        // ربط الخبر بتصنيف

        $table->timestamps(); // created_at و updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
