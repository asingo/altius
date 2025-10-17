<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function news()
    {
        $data = News::with('category')->get();
        $isHeaderOverlay = true;
        $title = 'News';
        $slug = 'news';
        return view('pages.news.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function newsDetail($slug)
    {
        $locale = 'en';
        $data = News::with('category')->where('slug->'.$locale, $slug)->first();
        if($data == null){
            abort(404);
        }
        $others = News::with('category')->whereNot('slug->'.$locale, $slug)->get()->take(3);
        $isHeaderOverlay = false;
        $title = $data['title'];
        return view('pages.news.single', compact('data', 'isHeaderOverlay', 'title', 'slug', 'others'));

    }

}
