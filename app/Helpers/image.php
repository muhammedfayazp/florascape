<?php

use Illuminate\Support\Str;

if (!function_exists('image_url')) {
    function image_url(?string $path, ?string $default = null): ?string
    {
        if (empty($path)) {
            return $default;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        $disk = config('filesystems.default', 'local');

        if ($disk === 's3' || config("filesystems.disks.{$disk}.driver") === 's3') {
            $bucket = config("filesystems.disks.{$disk}.bucket");
            $region = config("filesystems.disks.{$disk}.region");
            $baseUrl = config("filesystems.disks.{$disk}.url")
                ?: "https://{$bucket}.s3.{$region}.amazonaws.com";

            return rtrim($baseUrl, '/') . '/' . ltrim($path, '/');
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->url($path);
    }
}
