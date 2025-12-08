<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $isHeaderOverlay = false;
        $view = 'pages.about.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
           abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view($view, compact('isHeaderOverlay','page', 'title', 'slug'));
    }
}
