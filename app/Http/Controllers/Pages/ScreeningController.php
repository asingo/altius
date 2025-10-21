<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\HealthScreening;
use App\Models\Pages;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    public function screening()
    {
        $data = HealthScreening::get();
        $isHeaderOverlay = false;
        $view = 'pages.health-screening.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view($view, compact('data','page', 'isHeaderOverlay', 'title', 'slug'));
    }
}
