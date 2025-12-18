<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RobotsController extends Controller
{
    public function index()
    {
        $robots = "User-agent: *\n";
        $robots .= "Disallow: /admin\n";
        $robots .= "Disallow: /api\n\n";
        $robots .= "Sitemap: " . url('/sitemap.xml');

        return response($robots, 200)->header('Content-Type', 'text/plain');
    }
}
