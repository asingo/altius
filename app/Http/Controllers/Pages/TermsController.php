<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function terms()
    {
        $isHeaderOverlay = false;

        $view = 'pages.terms.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view('pages.accordion-single', compact('isHeaderOverlay', 'page', 'title', 'slug'));
    }
}
