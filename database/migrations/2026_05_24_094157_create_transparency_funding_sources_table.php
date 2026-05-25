<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transparency_funding_sources', function (Blueprint $table) {
            $table->id();
            $table->string('category_en');
            $table->string('category_ar');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // Seed initial data
        DB::table('transparency_funding_sources')->insert([
            // UN Agencies
            [
                'category_en' => 'UN Agencies',
                'category_ar' => 'وكالات الأمم المتحدة',
                'name_en' => 'UNICEF',
                'name_ar' => 'اليونيسف (UNICEF)',
                'icon' => 'fa-child-reaching',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'UN Agencies',
                'category_ar' => 'وكالات الأمم المتحدة',
                'name_en' => 'WHO',
                'name_ar' => 'منظمة الصحة العالمية (WHO)',
                'icon' => 'fa-hand-holding-medical',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // INGOs
            [
                'category_en' => 'INGOs',
                'category_ar' => 'المنظمات غير الحكومية الدولية',
                'name_en' => 'Plan International',
                'name_ar' => 'منظمة بلان إنترناشيونال',
                'icon' => 'fa-hands-holding',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'INGOs',
                'category_ar' => 'المنظمات غير الحكومية الدولية',
                'name_en' => 'COOPI',
                'name_ar' => 'منظمة كوبر (COOPI)',
                'icon' => 'fa-handshake-angle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'INGOs',
                'category_ar' => 'المنظمات غير الحكومية الدولية',
                'name_en' => 'Save the Children',
                'name_ar' => 'منظمة رعاية الطفولة',
                'icon' => 'fa-children',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'INGOs',
                'category_ar' => 'المنظمات غير الحكومية الدولية',
                'name_en' => 'Safer World',
                'name_ar' => 'سيفروورلد',
                'icon' => 'fa-shield-heart',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Membership Support
            [
                'category_en' => 'Membership Support',
                'category_ar' => 'دعم الأعضاء',
                'name_en' => 'Sons of Darfur in Switzerland',
                'name_ar' => 'أبناء دارفور في سويسرا',
                'icon' => 'fa-people-group',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'Membership Support',
                'category_ar' => 'دعم الأعضاء',
                'name_en' => 'MAO Membership',
                'name_ar' => 'عضوية منظمة ماما أفريكا',
                'icon' => 'fa-id-card',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transparency_funding_sources');
    }
};
