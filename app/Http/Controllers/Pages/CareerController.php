<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Pages;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function career(){
        $data = Career::get();
        $isHeaderOverlay = true;
        $view = 'pages.career.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view($view, compact('data', 'page', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function careerDetail($slug)
    {
        $data = Career::get();
        $locale = 'en';
        if ($data->where('slug', $slug)->isEmpty()) {
            abort(404);
        }
        $view = $data->firstWhere('slug', $slug);

        $isHeaderOverlay = false;
        $slug = 'career';
        $title = $view['title'];
        return view('pages.career.single', compact('view', 'title', 'isHeaderOverlay', 'slug'));
    }
}
