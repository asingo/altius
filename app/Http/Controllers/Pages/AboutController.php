<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $isHeaderOverlay = false;
        return view('pages.about.index', compact('isHeaderOverlay'));
    }
}
