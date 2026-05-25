<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    protected $table = 'contacts'; // اختياري (Laravel يعرفه لوحده)

    protected $fillable = [
        'phone_number',
        'facebook_url',
        'tiktok_url',
        'whatsapp_url',
        'instagram_url',
        'linkedin_url',
        'telegram_url',
        'x_url',
        'email',
        'location_ar',
        'location_en',
        'footer_desc_ar',
        'footer_desc_en',
        'developer_name_ar',
        'developer_name_en',
        'developer_link',
        'developer_logo',
    ];
}
