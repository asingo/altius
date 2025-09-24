<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    public function career(){
        $data = json_decode(file_get_contents(base_path('database/schema/career-altius.json')), true);
        $isHeaderOverlay = true;
        $title = 'Career';
        $slug = 'career';
        return view('pages.career.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function careerDetail($slug)
    {
        $data = collect(json_decode(file_get_contents(base_path('database/schema/career-altius.json')), true));
        if (!in_array($slug, $data->pluck('slug')->toArray())) {
            abort(404);
        }
        $view = $data->firstWhere('slug', $slug);
        $isHeaderOverlay = false;
        $slug = 'career';
        $title = $view['title'];
        return view('pages.career.single', compact('view', 'title', 'isHeaderOverlay', 'slug'));
    }
}
