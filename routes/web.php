<?php

use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\HomeController;

use App\Http\Controllers\Pages\LocationController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home');
}
);
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::controller(LocationController::class)->group(function () {
    Route::get('/location', 'location')->name('location');
    Route::get('/location/{slug}', 'locationDetail')->name('locationDetail');
});
