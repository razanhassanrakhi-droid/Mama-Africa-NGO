<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['title','details','challange'];

    // الأعمدة اللي مسموح نعمل لها Mass Assignment
    protected $fillable = [
        'title',
        'details',
        'image',
        'project_id',
       'pay',
       'youtube_link',
        'challange',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];


    // العلاقة مع التصنيف
     // العلاقة مع المشروع
    public function project()   // مفرد وليس جمع
    {
        return $this->belongsTo(Projects::class);  // Project وليس projects
    }

    public function getFallbackImageAttribute() {
        if ($this->project) {
            return $this->project->fallback_image;
        }
        return asset('images/peace_doves.png');
    }
}