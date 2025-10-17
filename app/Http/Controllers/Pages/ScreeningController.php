<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\HealthScreening;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    public function screening()
    {
        $data = HealthScreening::get();
        $isHeaderOverlay = false;
        $title = 'Health Screening';
        $slug = 'health-screening';
        return view('pages.health-screening.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }
}
