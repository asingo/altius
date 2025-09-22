<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function doctor()
    {
        $data = json_decode(file_get_contents(base_path('database/schema/doctor-altius.json')), true);
        $isHeaderOverlay = true;
        $title = 'Medical Professional';
        $slug = 'medical-professional';
        return view('pages.medical-professional.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }
}
