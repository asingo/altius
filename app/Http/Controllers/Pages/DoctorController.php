<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function doctor()
    {
        $data = Doctor::with(['speciality', 'hasLocation'])->get();
        $isHeaderOverlay = true;
        $title = 'Medical Professional';
        $slug = 'medical-professional';
        return view('pages.medical-professional.index', compact('data', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function doctorDetail($slug){
        $data  = Doctor::with(['speciality', 'hasLocation'])->where('slug', $slug)->first();
        if($data == null){
            abort(404);
        }
        $location = $data->hasLocation()->get()->map(function ($item) {
            $item['location_name'] = $item->location->title;
            return $item;
        });
        $isHeaderOverlay = false;
        $title = $data['name'];
        return view('pages.medical-professional.single', compact('data', 'isHeaderOverlay','location', 'title', 'slug'));
    }
}
