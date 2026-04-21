<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        // Share site settings with all views
        if (!app()->runningInConsole() && Schema::hasTable('site_settings')) {
            $settings = \App\Models\SiteSetting::first();
            \Illuminate\Support\Facades\View::share('siteSettings', $settings);

            if ($settings && $settings->site_name) {
                config(['app.name' => $settings->site_name]);
            }
        }
    }
}
