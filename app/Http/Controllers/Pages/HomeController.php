<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Slider;

class HomeController extends Controller
{
    public function home()
    {
        $isHeaderOverlay = true;
        $title = 'Home';
        $slug = 'home';

        $slider = Slider::orderBy('index', 'asc')->get();
        $sliderSetting = Setting::where('name', 'slider')->first();
        return view('pages.home.index', compact('isHeaderOverlay', 'sliderSetting', 'title', 'slider', 'slug'));
    }
}
