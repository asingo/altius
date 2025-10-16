<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{

    public function career(){
        $data = Career::all();
        $isHeaderOverlay = true;
        $title = 'Career';
        $slug = 'career';
        return view('pages.career.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
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
