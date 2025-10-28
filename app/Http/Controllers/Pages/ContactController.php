<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Pages;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $isHeaderOverlay = false;
        $view = 'pages.contact.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        $data = Location::all();
        return view($view, compact('isHeaderOverlay','page', 'title', 'slug', 'data'));
    }
}
