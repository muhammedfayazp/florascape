<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET') && !$request->expectsJson()) {
            $path = $request->path();

            // Exclude admin, livewire and storage routes
            if (
                !str_starts_with($path, 'admin') &&
                !str_starts_with($path, 'livewire') &&
                !str_starts_with($path, 'storage')
            ) {

                \App\Models\Visit::create([
                    'ip_address' => $request->ip(),
                    'path' => $path,
                    'user_agent' => $request->userAgent(),
                ]);
            }
        }

        return $next($request);
    }
}
