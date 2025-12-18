<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSiteIsPublished
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access to admin routes
        // Allow access to admin routes and Livewire (necessary for login)
        if ($request->is('admin*') || $request->is('livewire*')) {
            return $next($request);
        }

        // Allow logged in admins to see the site
        if (auth()->check()) {
            return $next($request);
        }

        $settings = \App\Models\SiteSetting::first();

        // If settings don't exist, or is_published is false, show maintenance
        if (!$settings || !$settings->is_published) {
            // Option 1: Abort 503 Service Unavailable (Maintenance Mode)
            // abort(503, 'The site is currently under maintenance.');

            // Option 2: Render a nicer view
            return response()->view('errors.maintenance', [], 503);
        }

        return $next($request);
    }
}
