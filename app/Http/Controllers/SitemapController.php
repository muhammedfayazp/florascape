<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Carbon\Carbon;

class SitemapController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_homepage', true)->get();
        $now = Carbon::now()->toAtomString();

        $urls = [
            ['loc' => route('home'), 'lastmod' => $now, 'priority' => '1.0'],
            ['loc' => route('services'), 'lastmod' => $now, 'priority' => '0.8'],
            ['loc' => route('portfolio'), 'lastmod' => $now, 'priority' => '0.8'],
            ['loc' => route('about'), 'lastmod' => $now, 'priority' => '0.8'],
            ['loc' => route('contact'), 'lastmod' => $now, 'priority' => '0.8'],
        ];

        foreach ($projects as $project) {
            $urls[] = [
                'loc' => route('home'), // Portfolio currently acts as home for projects since they are displayed there
                'lastmod' => $project->updated_at->toAtomString(),
                'priority' => '0.6',
            ];
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . $url['loc'] . '</loc>';
            $xml .= '<lastmod>' . $url['lastmod'] . '</lastmod>';
            $xml .= '<priority>' . $url['priority'] . '</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
