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

    public function doctorDetail($slug){
        $schema  = json_decode(file_get_contents(base_path('database/schema/doctor-altius.json')), true);
        $data = collect($schema)->filter(function ($item) use ($slug) {
            return $item['slug'] === $slug;
        })->first();
        if($data == null){
            abort(404);
        }
        $isHeaderOverlay = false;
        $title = $data['name'];
        return view('pages.medical-professional.single', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }
}
