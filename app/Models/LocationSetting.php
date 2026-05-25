<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationSetting extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'latitude',
        'longitude',
        'audit_pdf',
        'activity_description_ar',
        'activity_description_en',
        'start_date',
        'end_date',
    ];

    public function auditLogs()
    {
        return $this->hasMany(LocationAuditLog::class);
    }
}
