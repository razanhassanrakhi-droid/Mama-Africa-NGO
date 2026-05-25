<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparencyFundingSource extends Model
{
    protected $table = 'transparency_funding_sources';

    protected $fillable = [
        'category_en',
        'category_ar',
        'name_en',
        'name_ar',
        'icon',
    ];
}
