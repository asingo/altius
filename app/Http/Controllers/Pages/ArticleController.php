<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\News;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    public function article()
    {
        $data = Article::all();
        $isHeaderOverlay = true;
        $view = 'pages.article.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view('pages.article.index', compact('data','page', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function articleDetail($slug)
    {
        $locale = app()->getLocale();
        $data = Article::where('slug->'.$locale, $slug)->first();
        if($data == null){
            abort(404);
        }
        $others = Article::whereNot('slug->'.$locale, $slug)->get()->take(3);
        $isHeaderOverlay = false;
        $title = $data['title'];
        Session::flash('single_content', $data->toArray());
        return view('pages.article.single', compact('data', 'isHeaderOverlay', 'title', 'slug', 'others'));

    }
}
