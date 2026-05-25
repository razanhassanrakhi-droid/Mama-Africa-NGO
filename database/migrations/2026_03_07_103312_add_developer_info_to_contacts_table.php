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
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('developer_name_ar')->nullable();
            $table->string('developer_name_en')->nullable();
            $table->string('developer_link')->nullable();
            $table->string('developer_logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn([
                'developer_name_ar',
                'developer_name_en',
                'developer_link',
                'developer_logo',
            ]);
        });
    }
};
