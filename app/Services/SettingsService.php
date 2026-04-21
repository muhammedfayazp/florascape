<?php

namespace App\Services;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    public static function get(string $key, mixed $default = null): mixed
    {
        // 1. ENV override (highest priority)
        $envKey = strtoupper($key);
        if (!is_null(env($envKey))) {
            return env($envKey);
        }

        // 2. Cached DB settings
        $settings = Cache::rememberForever('site_settings', function () {
            return SiteSetting::first()?->toArray() ?? [];
        });

        return data_get($settings, $key, $default);
    }

    public static function set(array $data): void
    {
        $settings = SiteSetting::firstOrCreate([]);

        $settings->update($data);

        Cache::forget('site_settings');
    }

    public static function refreshCache(): void
    {
        Cache::forget('site_settings');
    }
}
