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
            $query->orderBy('sort_order');
        }
    ])->orderBy('sort_order')->get();

    return view('welcome', compact('categories'));
})->name('home');

Route::get('/services', function () {
    $services = \App\Models\Service::orderBy('sort_order')->get();
    return view('services', compact('services'));
})->name('services');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
