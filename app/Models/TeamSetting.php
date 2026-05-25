<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamSetting extends Model
{
    protected $fillable = [
        'title_en', 'title_ar',
        'desc_en', 'desc_ar',
    ];
}
