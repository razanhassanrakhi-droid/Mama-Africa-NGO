<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparencyReport extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'year',
        'file_path',
    ];
}
