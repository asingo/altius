<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use stdClass;

class LocationController extends Controller
{
    protected function schema()
    {
        return [
            [
                'id' => 1,
                'title' => 'Altius Hospitals Puri Indah',
                'slug' => 'altius-hospitals-puri-indah',
                'meta' => 'Cardiology, Urology, Orthopedic',
                'image' => '',
                'thumbnail' => 'asset/Locations/LocationsPage/image-altius-hospitals-puri-indah.jpg',
                'link_maps' => '',
                'link_contact' => ''
            ],[
                'id' => 2,
                'title' => 'Altius Hospitals Harapan Indah',
                'slug' => 'altius-hospitals-Harapan-indah',
                'meta' => 'Cardiology, Orthopedic, Woman & Children',
                'image' => '',
                'thumbnail' => 'asset/Locations/LocationsPage/image-altius-hospitals-harapan-indah.jpg',
                'link_maps' => '',
                'link_contact' => ''
            ],[
                'id' => 3,
                'title' => 'Altius Cardiac Clinic',
                'slug' => 'altius-cardiac-clinic',
                'meta' => 'Cardiology',
                'image' => '',
                'thumbnail' => 'asset/Locations/LocationsPage/image-altius-cardiac-clinic.jpg',
                'link_maps' => '',
                'link_contact' => ''
            ]
        ];
    }

    public function location()
    {
        $isHeaderOverlay = false;
        $title = 'Our Locations';
        $slug = 'location';
        $data = json_decode(json_encode($this->schema()));
        return view('pages.location.index', compact('isHeaderOverlay', 'title', 'slug', 'data'));
    }
}
