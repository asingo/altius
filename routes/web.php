<?php

use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\CareerController;
use App\Http\Controllers\Pages\DoctorController;
use App\Http\Controllers\Pages\HomeController;

use App\Http\Controllers\Pages\LocationController;
use App\Http\Controllers\Pages\ScreeningController;
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
Route::controller(DoctorController::class)->group(function () {
    Route::get('/medical-professional', 'doctor')->name('doctor');
    Route::get('/medical-professional/{slug}', 'doctorDetail')->name('doctorDetail');
});
Route::controller(CareerController::class)->group(function () {
   Route::get('/career', 'career')->name('career');
   Route::get('/career/{slug}', 'careerDetail')->name('careerDetail');
});
Route::controller(ScreeningController::class)->group(function () {
    Route::get('/health-screening', 'screening')->name('screening');
});
