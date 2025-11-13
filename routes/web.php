<?php

use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\CareerController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\DoctorController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\LocationController;
use App\Http\Controllers\Pages\NewsController;
use App\Http\Controllers\Pages\ScreeningController;
use App\Livewire\Auth\CreateAccount;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\LoginEmail;
use Illuminate\Support\Facades\Route;

$locales = ['en' => '', 'id' => 'id'];

foreach ($locales as $key => $prefix) {
    Route::prefix($prefix)->middleware('locale')->group(function () use ($key) {
        foreach (\App\Models\Pages::get() as $page) {
            Route::controller('\\' . $page->controller)->group(function () use ($page, $key) {
                // Clean slug (remove leading/trailing slashes just in case)
                $slug = ltrim($page->getTranslation('slug', $key), '/');
                Route::get("/{$slug}", $page->route_name)->name("{$page->route_name}_$key");
                if ($page->route_name_detail != null) {
                    Route::get("/{$slug}/{slug}", $page->route_name_detail)->name("{$page->route_name_detail}_$key");
                }

            });
        }
        Route::get('/thank-you', [CareerController::class, 'successSubmission'])->name('successSubmission_'.$key);
        Route::get('/thank-you-feedback', [HomeController::class, 'successFeedback'])->name('successFeedback_'.$key);
        Route::prefix('profile')->middleware('auth:web')->group(function () use ($key) {
            Route::get('/', [ProfileController::class, 'profile'])->name('profile_'.$key);

        });
    });
}

Route::get('/login', Login::class)->name('login');
Route::get('/logout',[ProfileController::class,'logout'])->name('logout');
Route::get('/register', CreateAccount::class)->name('register');
Route::get('/login/email', LoginEmail::class)->name('loginEmail');



//);
//Route::get('/about', [AboutController::class, 'about'])->name('about');
//Route::controller(LocationController::class)->group(function () {
//    Route::get('/location', 'location')->name('location');
//    Route::get('/location/{slug}', 'locationDetail')->name('locationDetail');
//});
//Route::controller(DoctorController::class)->group(function () {
//    Route::get('/medical-professional', 'doctor')->name('doctor');
//    Route::get('/medical-professional/{slug}', 'doctorDetail')->name('doctorDetail');
//});
//Route::controller(CareerController::class)->group(function () {
//    Route::get('/career', 'career')->name('career');
//    Route::get('/career/{slug}', 'careerDetail')->name('careerDetail');
//});
//Route::controller(ScreeningController::class)->group(function () {
//    Route::get('/health-screening', 'screening')->name('screening');
//});

//Route::controller(NewsController::class)->group(function () {
//    Route::get('/news', 'news')->name('news');
//    Route::get('/news/{slug}', 'newsDetail')->name('newsDetail');
//});
//Route::controller(OffersController::class)->group(function () {
//    Route::get('/offers', 'offers')->name('offers');
//});
//Route::get('{locale?}/{any?}', [\App\Http\Controllers\PageController::class, 'resolve'])
//    ->where(['locale' => 'id', 'any' => '.*'])->name('page');
