<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function offers()
    {
        $data = json_decode(file_get_contents(base_path('database/schema/offers-altius.json')), true);
        $isHeaderOverlay = false;
        $title = 'Offers';
        $slug = 'offers';
        return view('pages.offers.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }
}
