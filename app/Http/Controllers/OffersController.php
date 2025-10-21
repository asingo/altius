<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Pages;
use Illuminate\Http\Request;

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
}
