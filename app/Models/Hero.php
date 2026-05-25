<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'image',
        'org_name_ar',
        'org_name_en',
        'tagline_ar',
        'tagline_en',
        'logo',
    ];
}
