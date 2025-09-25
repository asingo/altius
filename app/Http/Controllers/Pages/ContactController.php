<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        $isHeaderOverlay = false;
        $title = 'Contact Us';
        $slug = 'contact-us';
        $data = json_decode(file_get_contents(base_path('database/schema/location-altius.json')), true);
        return view('pages.contact.index', compact('isHeaderOverlay', 'title', 'slug', 'data'));
    }
}
