<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationAuditLog extends Model
{
    protected $fillable = [
        'location_setting_id',
        'file_path',
        'start_date',
        'end_date',
    ];

    public function locationSetting()
    {
        return $this->belongsTo(LocationSetting::class);
    }
}
