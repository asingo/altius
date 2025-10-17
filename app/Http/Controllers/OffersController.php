<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function offers()
    {
        $data = Offer::with(['category', 'hasLocation'])->get();
        $isHeaderOverlay = false;
        $title = 'Offers';
        $slug = 'offers';
        return view('pages.offers.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }
}
