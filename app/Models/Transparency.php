<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transparency extends Model
{
    protected $fillable = [
        'title_en', 'title_ar',
        'desc_en', 'desc_ar',
        'show_counter_values',
        'report_url',
        'report_file',
        'report_mode',
        'counter1_value', 'counter1_label_en', 'counter1_label_ar',
        'counter2_value', 'counter2_label_en', 'counter2_label_ar',
        'counter3_value', 'counter3_label_en', 'counter3_label_ar',
        'counter4_value', 'counter4_label_en', 'counter4_label_ar',
        'counter5_value', 'counter5_label_en', 'counter5_label_ar',
        'counter6_value', 'counter6_label_en', 'counter6_label_ar',
        'financial_programs', 'financial_operations', 'financial_admin',
        'percentage_clean_water', 'percentage_training', 'percentage_nutrition', 'percentage_environment',
    ];
}
