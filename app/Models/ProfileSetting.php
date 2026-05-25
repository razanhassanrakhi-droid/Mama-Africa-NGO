<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileSetting extends Model
{
    protected $table = 'profile_settings';

    protected $fillable = [
        'hero_title_ar', 'hero_title_en',
        'hero_subtitle_ar', 'hero_subtitle_en',
        'hero_pill1_icon', 'hero_pill1_text_ar', 'hero_pill1_text_en',
        'hero_pill2_icon', 'hero_pill2_text_ar', 'hero_pill2_text_en',
        'hero_pill3_icon', 'hero_pill3_text_ar', 'hero_pill3_text_en',
        
        'objectives_title_ar', 'objectives_title_en',
        
        'timeline_title_ar', 'timeline_title_en',
        
        'journey_title_ar', 'journey_title_en',
        'journey_pos_title_ar', 'journey_pos_title_en',
        'journey_pos_desc_ar', 'journey_pos_desc_en',
        'journey_pos_pill_icon', 'journey_pos_pill_ar', 'journey_pos_pill_en',
        'journey_neg_title_ar', 'journey_neg_title_en',
        'journey_neg_desc_ar', 'journey_neg_desc_en',
        
        'capacity_title_ar', 'capacity_title_en',
        'capacity_desc_ar', 'capacity_desc_en',
        'capacity_summary_title_ar', 'capacity_summary_title_en',
        'capacity_summary_desc_ar', 'capacity_summary_desc_en',
        'capacity_internal_title_ar', 'capacity_internal_title_en',
        'capacity_external_title_ar', 'capacity_external_title_en',
        
        'snapshot_title_ar', 'snapshot_title_en',
        
        'swot_title_ar', 'swot_title_en',
        'swot_strengths_title_ar', 'swot_strengths_title_en', 'swot_strengths_icon',
        'swot_weaknesses_title_ar', 'swot_weaknesses_title_en', 'swot_weaknesses_icon',
        'swot_opportunities_title_ar', 'swot_opportunities_title_en', 'swot_opportunities_icon',
        'swot_needs_title_ar', 'swot_needs_title_en', 'swot_needs_icon',
        
        'methodology_title_ar', 'methodology_title_en',
        'methodology_subtitle_ar', 'methodology_subtitle_en',
        'methodology_grants_title_ar', 'methodology_grants_title_en', 'methodology_grants_icon',
        'methodology_me_title_ar', 'methodology_me_title_en', 'methodology_me_icon',
        'methodology_cross_title_ar', 'methodology_cross_title_en',
        'methodology_cross_desc_ar', 'methodology_cross_desc_en',
        
        'serve_title_ar', 'serve_title_en',
        'serve_subtitle_ar', 'serve_subtitle_en',
        'serve_desc_ar', 'serve_desc_en',
        
        'contact_title_ar', 'contact_title_en',
        'contact_subtitle_ar', 'contact_subtitle_en',
        'contact_desc_ar', 'contact_desc_en',
        'contact_name_ar', 'contact_name_en',
        'contact_position_ar', 'contact_position_en',
        'contact_email', 'contact_phone', 'contact_photo'
    ];
}
