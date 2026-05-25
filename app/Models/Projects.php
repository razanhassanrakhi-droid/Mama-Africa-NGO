<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Projects extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name','description','challange'];

    // اسم الجدول لو محتاج تحدده (اختياري لو Laravel يتبع الاسم convention)
    protected $table = 'projects';

    // الحقول اللي مسموح لها يتم الحفظ فيها
    protected $fillable = [
        'name',
        'image',
        'icon',
        'description',
        'challange',
    ];

    public function activities()
    {
        return $this->hasMany(ProjectActivity::class, 'project_id');
    }

    public function getFallbackImageAttribute() {
        $name = $this->getTranslation('name', 'en', false);
        if (!$name) {
            $name = $this->name;
        }
        if (!is_string($name)) {
            $name = (string) $name;
        }
        
        $nameLower = strtolower($name);
        
        if (str_contains($nameLower, 'water') || str_contains($nameLower, 'sanitation') || str_contains($nameLower, 'مياه') || str_contains($nameLower, 'صرف')) {
            return asset('images/fallback_water.png');
        }
        if (str_contains($nameLower, 'education') || str_contains($nameLower, 'تعليم') || str_contains($nameLower, 'training') || str_contains($nameLower, 'تدريب') || str_contains($nameLower, 'school') || str_contains($nameLower, 'مدرسة')) {
            return asset('images/fallback_education.png');
        }
        if (str_contains($nameLower, 'protection') || str_contains($nameLower, 'حماية') || str_contains($nameLower, 'empowerment') || str_contains($nameLower, 'تمكين') || str_contains($nameLower, 'women') || str_contains($nameLower, 'نساء')) {
            return asset('images/fallback_protection.png');
        }
        if (str_contains($nameLower, 'health') || str_contains($nameLower, 'صحة') || str_contains($nameLower, 'medical') || str_contains($nameLower, 'طبي') || str_contains($nameLower, 'nutrition') || str_contains($nameLower, 'تغذية') || str_contains($nameLower, 'care')) {
            return asset('images/fallback_healthcare.png');
        }
        
        return asset('images/peace_doves.png');
    }
}
