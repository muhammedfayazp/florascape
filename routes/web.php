<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $categories = \App\Models\ProjectCategory::with([
        'projects' => function ($query) {
            $query->where('is_visible_on_homepage', true)->orderBy('sort_order');
        }
    ])->orderBy('sort_order')->get();

    $heroSlides = \App\Models\Slider::where('type', 'homepage')->first();

    $sections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('section_key');
    $services = \App\Models\Service::where('type', 'main')->orderBy('sort_order')->get();

    return view('welcome', compact('categories', 'heroSlides', 'sections', 'services'));
})->name('home');

Route::get('/portfolio', function () {
    $categories = \App\Models\ProjectCategory::with([
        'projects' => function ($query) {
            $query->orderBy('sort_order');
        }
    ])->orderBy('sort_order')->get();

    $sections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('section_key');

    return view('portfolio', compact('categories', 'sections'));
})->name('portfolio');

Route::get('/services', function () {
    $services = \App\Models\Service::orderBy('sort_order')->get();
    $sections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('section_key');
    return view('services', compact('services', 'sections'));
})->name('services');

Route::get('/about', function () {
    $sections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('section_key');
    return view('about', compact('sections'));
})->name('about');

Route::get('/contact', function () {
    $sections = \App\Models\PageSection::where('is_active', true)->get()->keyBy('section_key');
    return view('contact', compact('sections'));
})->name('contact');

Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index']);
Route::get('/robots.txt', [\App\Http\Controllers\RobotsController::class, 'index']);

Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
