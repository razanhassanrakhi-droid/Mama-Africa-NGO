<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileItem extends Model
{
    protected $table = 'profile_items';

    protected $fillable = [
        'type',
        'icon',
        'title_ar',
        'title_en',
        'value_ar',
        'value_en',
        'extra_value_ar',
        'extra_value_en',
        'number_value',
        'sort_order'
    ];
}
