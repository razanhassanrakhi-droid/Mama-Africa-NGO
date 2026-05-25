<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Testimonials extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name','comment'];

    protected $table = 'testimonials'; // اختياري (Laravel هيعرفه لوحده)

    protected $fillable = [
        'name',
        'comment',
        'image',
        'video_link',
    ];
}
