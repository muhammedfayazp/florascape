<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_published',
        'site_name',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'favicon',
        'social_links',
        'phone',
        'email',
        'address',
        'google_analytics_id',
        'gtm_id',
        'header_scripts',
        'footer_scripts',
        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'whatsapp_number'
    ];
}
