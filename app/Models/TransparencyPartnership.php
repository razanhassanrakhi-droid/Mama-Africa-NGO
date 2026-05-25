<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransparencyPartnership extends Model
{
    protected $table = 'transparency_partnerships';

    protected $fillable = [
        'category_en',
        'category_ar',
        'name_en',
        'name_ar',
        'icon',
    ];
}
