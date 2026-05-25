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
    Schema::create('members', function (Blueprint $table) {
        $table->id(); // رقم تلقائي

        $table->string('name'); // اسم العضو
        $table->string('position'); // اسم الوظيفة (مثلاً: مدير مشروع)
        $table->string('role'); // دور العضو (مثلاً: إداري / ميداني / إعلامي)
        $table->string('image')->nullable(); // صورة العضو

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
