<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectActivity extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $table = 'project_activities';

    public $translatable = [
        'title',
        'description',
        'detail',
        'location',
        'date',
        'funded_by',
        'status',
    ];

    protected $fillable = [
        'project_id',
        'title',
        'description',
        'detail',
        'location',
        'date',
        'funded_by',
        'amount',
        'status',
        'icon',
    ];

    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }

    /**
     * Get the effective icon (falls back to the project's icon if this activity doesn't have a custom icon).
     */
    public function getEffectiveIconAttribute()
    {
        return $this->icon ?: ($this->project->icon ?: 'fas fa-hands-helping');
    }
}
