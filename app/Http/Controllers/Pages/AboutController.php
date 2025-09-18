<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $isHeaderOverlay = false;
        $title = 'About Altius Hospitals';
        $slug = 'about';
        return view('pages.about.index', compact('isHeaderOverlay', 'title', 'slug'));
    }
}
