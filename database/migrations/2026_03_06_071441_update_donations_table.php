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
        Schema::table('donations', function (Blueprint $table) {
            // Handle existing columns safely
            if (Schema::hasColumn('donations', 'iban')) {
                $table->string('iban')->nullable()->change();
            }
            
            if (Schema::hasColumn('donations', 'project_id')) {
                $table->foreignId('project_id')->nullable()->change();
            } else {
                $table->foreignId('project_id')->nullable()->constrained('projects')->cascadeOnDelete();
            }

            // Ensure core columns exist
            if (!Schema::hasColumn('donations', 'donor_name')) {
                $table->string('donor_name');
            }
            if (!Schema::hasColumn('donations', 'amount')) {
                $table->decimal('amount', 15, 2);
            }

            // Add new columns
            if (!Schema::hasColumn('donations', 'donor_email')) {
                $table->string('donor_email')->nullable();
            }
            if (!Schema::hasColumn('donations', 'currency')) {
                $table->string('currency', 3)->default('USD');
            }
            if (!Schema::hasColumn('donations', 'payment_method_id')) {
                $table->foreignId('payment_method_id')->nullable()->constrained()->onDelete('set null');
            }
            if (!Schema::hasColumn('donations', 'transaction_reference')) {
                $table->string('transaction_reference')->nullable()->index();
            }
            if (!Schema::hasColumn('donations', 'message')) {
                $table->text('message')->nullable();
            }
            if (!Schema::hasColumn('donations', 'status')) {
                $table->enum('status', ['pending', 'confirmed', 'failed', 'refunded'])->default('pending');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // ... (keep same down method or simplify)
    }
};
