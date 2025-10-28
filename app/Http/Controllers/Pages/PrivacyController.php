<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Pages;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function privacy()
    {
        $isHeaderOverlay = false;

        $view = 'pages.privacy.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view('pages.accordion-single', compact('isHeaderOverlay', 'page', 'title', 'slug'));
    }
}
