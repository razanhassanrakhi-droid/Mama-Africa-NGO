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
    Schema::create('testimonials', function (Blueprint $table) {
        $table->id(); // رقم تلقائي

        $table->string('name'); // اسم الشخص
        $table->text('comment'); // التعليق
        $table->string('image')->nullable(); // صورة الشخص (اختياري)

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
