<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Members extends Model
{
    use HasFactory;
 use HasTranslations;
    public $translatable = ['name','position','role', 'message'];

    // اسم الجدول (اختياري)
    protected $table = 'members';

    // الحقول القابلة للإدخال الجماعي
    protected $fillable = [
        'name',
        'position',
        'role',
        'message',
        'image',
    ];
}
