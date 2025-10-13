<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $isHeaderOverlay = false;
        $title = 'Contact Us';
        $slug = 'contact-us';
        $data = Location::all();
        return view('pages.contact.index', compact('isHeaderOverlay', 'title', 'slug', 'data'));
    }
}
