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
}
