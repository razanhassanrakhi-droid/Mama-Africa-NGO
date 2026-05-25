<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'vision_title_ar', 'vision_title_en', 'vision_desc_ar', 'vision_desc_en', 'vision_image',
        'value_title_ar', 'value_title_en', 'value_image',
        'value_participation_ar', 'value_participation_en', 'value_participation_desc_ar', 'value_participation_desc_en',
        'value_integrity_ar', 'value_integrity_en', 'value_integrity_desc_ar', 'value_integrity_desc_en',
        'value_transparency_ar', 'value_transparency_en', 'value_transparency_desc_ar', 'value_transparency_desc_en',
        'value_accountability_ar', 'value_accountability_en', 'value_accountability_desc_ar', 'value_accountability_desc_en',
        'mission_title_ar', 'mission_title_en', 'mission_desc_ar', 'mission_desc_en', 'mission_image',
        'history_title_ar', 'history_title_en', 'history_desc_ar', 'history_desc_en', 'history_image',
        'goal_title_ar', 'goal_title_en', 'goal_desc_ar', 'goal_desc_en', 'goal_image',
    ];
}
