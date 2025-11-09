<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\HealthScreening;
use App\Models\Location;
use App\Models\LocationHasCoe;
use App\Models\LocationHasEmergency;
use App\Models\LocationHasFacilities;
use App\Models\LocationHasSpeciality;
use App\Models\LocationHasSubservice;
use App\Models\News;
use App\Models\Pages;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScreeningController extends Controller
{
    public function screening()
    {
        $data = HealthScreening::get();
        $isHeaderOverlay = false;
        $view = 'pages.health-screening.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        return view($view, compact('data','page', 'isHeaderOverlay', 'title', 'slug'));
    }

    public function screeningDetail($slug)
    {
        $locale = app()->getLocale();
        $data = HealthScreening::with(['hasLocation', 'category', 'hasAge'])->where('slug->'.$locale, $slug)->first();
        if($data == null){
            abort(404);
        }
        $others = HealthScreening::whereNot('slug->'.$locale, $slug)->get()->take(4);
        $isHeaderOverlay = false;
        $title = $data['title'];
        Session::flash('single_content', $data->toArray());
        return view('pages.health-screening.single', compact('data', 'isHeaderOverlay', 'title', 'slug', 'others'));

    }
}
