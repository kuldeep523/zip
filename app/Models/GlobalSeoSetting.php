<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSeoSetting extends Model
{
    protected $fillable = [
        'site_title', 'site_description', 'site_keywords',
        'google_analytics_id', 'google_tag_manager_id', 'facebook_pixel_id',
        'robots_txt', 'organization_schema',
    ];

    protected function casts(): array
    {
        return ['organization_schema' => 'array'];
    }
}
