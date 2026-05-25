<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'cleanwater_value', 'cleanwater_text_ar', 'cleanwater_text_en',
        'education_value', 'education_text_ar', 'education_text_en',
        'villages_value', 'villages_text_ar', 'villages_text_en',
        'funds_value', 'funds_text_ar', 'funds_text_en',
    ];
}
