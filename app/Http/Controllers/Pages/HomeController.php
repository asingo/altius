<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $isHeaderOverlay = true;
        return view('pages.home.index', compact('isHeaderOverlay'));
    }
}
