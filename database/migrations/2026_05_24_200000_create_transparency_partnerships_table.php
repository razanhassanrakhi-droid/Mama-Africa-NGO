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
        Schema::create('transparency_partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('category_en');
            $table->string('category_ar');
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('icon')->nullable();
            $table->timestamps();
        });

        // Seed initial data based on hardcoded content
        DB::table('transparency_partnerships')->insert([
            // Local NGOs
            [
                'category_en' => 'Local NGOs',
                'category_ar' => 'المنظمات غير الحكومية المحلية',
                'name_en' => 'Jabal Sae Organization for Peace and Development',
                'name_ar' => 'منظمة جبل ساعي للسلام والتنمية',
                'icon' => 'fa-dove',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'Local NGOs',
                'category_ar' => 'المنظمات غير الحكومية المحلية',
                'name_en' => 'Future Stars Centre',
                'name_ar' => 'مركز نجوم المستقبل',
                'icon' => 'fa-star',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'Local NGOs',
                'category_ar' => 'المنظمات غير الحكومية المحلية',
                'name_en' => 'Holistic Medicine Social Affairs',
                'name_ar' => 'شؤون الطب الشمولي الاجتماعية',
                'icon' => 'fa-notes-medical',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'Local NGOs',
                'category_ar' => 'المنظمات غير الحكومية المحلية',
                'name_en' => 'Tabasheer',
                'name_ar' => 'تباشير',
                'icon' => 'fa-sun',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Government & Local Institutions
            [
                'category_en' => 'Government & Local Institutions',
                'category_ar' => 'المؤسسات الحكومية والمحلية',
                'name_en' => 'Ministry of Social Affairs',
                'name_ar' => 'وزارة الشؤون الاجتماعية',
                'icon' => 'fa-users',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_en' => 'Government & Local Institutions',
                'category_ar' => 'المؤسسات الحكومية والمحلية',
                'name_en' => 'Ministry of Health',
                'name_ar' => 'وزارة الصحة',
                'icon' => 'fa-hospital',
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
        Schema::dropIfExists('transparency_partnerships');
    }
};
