<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    public function screening()
    {
        $data = json_decode(file_get_contents(base_path('database/schema/health-screening.json')), true);
        $isHeaderOverlay = false;
        $title = 'Health Screening';
        $slug = 'health-screening';
        return view('pages.health-screening.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }
}
