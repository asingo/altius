<?php

namespace App\Http\Controllers;

use App\Models\HealthScreening;
use App\Models\Offer;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OffersController extends Controller
{
    public function offers()
    {
        $data = Offer::with(['category', 'hasLocation'])->get();
        $isHeaderOverlay = false;
        $view = 'pages.offers.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view($view, compact('data','page', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function offersDetail($slug)
    {
        $locale = app()->getLocale();
        $data = Offer::with(['hasLocation', 'category'])->where('slug->'.$locale, $slug)->first();
        if($data == null){
            abort(404);
        }
        $others = Offer::whereNot('slug->'.$locale, $slug)->get()->take(4);
        $isHeaderOverlay = false;
        $title = $data['title'];
        Session::flash('single_content', $data->toArray());
        return view('pages.offers.single', compact('data', 'isHeaderOverlay', 'title', 'slug', 'others'));

    }
}
