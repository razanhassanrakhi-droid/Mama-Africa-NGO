<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


   return new class extends Migration {
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->foreignId('project_id')
                  ->after('id')
                  ->constrained('projects')
                  ->cascadeOnDelete(); // لو اتشال المشروع، الأخبار اللي مرتبطة بيه تتشال
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');
        });
    }
};
