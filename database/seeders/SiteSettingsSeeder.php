<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'is_published' => true,
                'site_name' => 'Florascape',
                'meta_title' => 'My Website',
                'meta_description' => 'Default description',
                'meta_keywords' => 'website, laravel',
                'og_image' => null,
                'favicon' => null,
                'social_links' => json_encode([]),
                'phone' => null,
                'email' => null,
                'address' => null,
                'google_analytics_id' => null,
                'gtm_id' => null,
                'header_scripts' => null,
                'footer_scripts' => null,
                'facebook_url' => null,
                'instagram_url' => null,
                'linkedin_url' => null,
                'whatsapp_number' => null,
            ]
        );
    }
}
