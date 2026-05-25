<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transparencies', function (Blueprint $table) {
            // file path stored in storage/app/public/reports/
            $table->string('report_file')->nullable()->after('report_url');
            // visitor option: 'download' or 'view' (default download)
            $table->enum('report_mode', ['download', 'view'])->default('download')->after('report_file');
        });
    }

    public function down(): void
    {
        Schema::table('transparencies', function (Blueprint $table) {
            $table->dropColumn(['report_file', 'report_mode']);
        });
    }
};
