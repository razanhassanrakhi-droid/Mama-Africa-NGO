<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalContent extends Model
{
    protected $fillable = [
        'page_type',
        'phone', 'email',
        'title_ar', 'title_en',
        'intro_ar', 'intro_en',
        'privacy_intro_long_ar', 'privacy_intro_long_en',
        's1_title_ar', 's1_title_en', 's1_content_ar', 's1_content_en',
        's2_title_ar', 's2_title_en', 's2_content_ar', 's2_content_en',
        's3_title_ar', 's3_title_en', 's3_content_ar', 's3_content_en',
        's4_title_ar', 's4_title_en', 's4_content_ar', 's4_content_en',
        's5_title_ar', 's5_title_en', 's5_content_ar', 's5_content_en',
        's6_title_ar', 's6_title_en', 's6_content_ar', 's6_content_en',
    ];
}
