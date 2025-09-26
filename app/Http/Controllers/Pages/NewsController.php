<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function news()
    {
        $data = json_decode(file_get_contents(base_path('database/schema/article-altius.json')), true);
        $isHeaderOverlay = true;
        $title = 'News';
        $slug = 'news';
        return view('pages.news.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function newsDetail($slug)
    {
        $schema = json_decode(file_get_contents(base_path('database/schema/article-altius.json')), true);
        $data = collect($schema)->filter(function ($item) use ($slug) {
            return $item['slug'] === $slug;
        })->first();
        if($data == null){
            abort(404);
        }
        $others = collect($schema)->reject(function ($item) use ($slug) {
            return $item['slug'] === $slug;
        })->take(3);
        $isHeaderOverlay = false;
        $title = $data['title'];
        return view('pages.news.single', compact('data', 'isHeaderOverlay', 'title', 'slug', 'others'));

    }

}
