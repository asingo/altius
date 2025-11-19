<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Pages;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    public function doctor()
    {
        $data = Doctor::with(['speciality', 'hasLocation'])->orderBy('name', 'asc')->get();
        $isHeaderOverlay = true;
        $view = 'pages.medical-professional.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view($view, compact('data','page', 'isHeaderOverlay', 'title', 'slug'));
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
        $page = Pages::where('view', 'pages.medical-professional.index')->first();
        $slug = $page->slug;
        Session::flash('single_content', $data->toArray());
        return view('pages.medical-professional.single', compact('data', 'isHeaderOverlay','location', 'title', 'slug'));
    }
}
