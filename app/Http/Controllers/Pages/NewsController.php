<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    public function news()
    {
        $data = News::with('category')->get();
        $isHeaderOverlay = true;
        $view = 'pages.news.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view('pages.news.index', compact('data','page', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function newsDetail($slug)
    {
        $locale = app()->getLocale();
        $data = News::with('category')->where('slug->'.$locale, $slug)->first();
        if($data == null){
            abort(404);
        }
        $others = News::with('category')->whereNot('slug->'.$locale, $slug)->get()->take(3);
        $isHeaderOverlay = false;
        $title = $data['title'];
       Session::flash('single_content', $data->toArray());
        return view('pages.news.single', compact('data', 'isHeaderOverlay', 'title', 'slug', 'others'));

    }

}
