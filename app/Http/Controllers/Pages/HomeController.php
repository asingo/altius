<?php

namespace App\Http\Controllers\Pages;
use App\Http\Controllers\Controller;
use App\Models\HealthScreening;
use App\Models\Offer;
use App\Models\Pages;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimony;

class HomeController extends Controller
{
    public function home()
    {
        $isHeaderOverlay = true;
        $view = 'pages.home.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;

        $slider = Slider::orderBy('index', 'asc')->get();
        $sliderSetting = Setting::where('name', 'slider')->first();
        $testimonies = Testimony::get();
        $healthScreening = HealthScreening::all()->take(9);
        $offers = Offer::all()->take(9);
        return view($view, compact('isHeaderOverlay','page','testimonies',
            'sliderSetting', 'title', 'slider', 'slug','healthScreening', 'offers'));
    }

    public function successFeedback()
    {
        $locale = app()->getLocale();
        $title = 'Feedback Submission';
        $isHeaderOverlay = false;
        $slug = 'thank-you-feedback';
        $heading = 'Your Feedback has been submitted!';
        $buttonLabel = 'Back to Home';
        $description = '<p>We love hearing from you!</p><p>Thank you for your valuable feedback</p>';
        if($locale == 'id'){
            $heading = 'Saran dan Masukan anda telah dikirim!';
            $buttonLabel = 'Kembali ke Beranda';
            $description = '<p>Terima kasih atas saran dan masukan yang diberikan.</p><p>Saran dan masukan yang dikirimkan sangat berarti bagi kami.</p>';
        }
        return view('typ', compact('title', 'isHeaderOverlay', 'slug', 'heading', 'description', 'buttonLabel'));
    }
}
