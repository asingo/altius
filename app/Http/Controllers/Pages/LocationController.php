<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LocationHasCoe;
use App\Models\LocationHasEmergency;
use App\Models\LocationHasFacilities;
use App\Models\LocationHasSpeciality;
use App\Models\LocationHasSubservice;
use App\Models\Pages;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use stdClass;
use function Laravel\Prompts\error;

class LocationController extends Controller
{
    public function location()
    {
        $isHeaderOverlay = false;

        $view = 'pages.location.index';
        $page = Pages::where('view', $view)->first();
        if($page == null){
            abort(404);
        }
        $title = $page->title;
        $slug = $page->slug;
        $data = Location::all();
        return view($view, compact('isHeaderOverlay', 'page', 'title', 'slug', 'data'));
    }

    public function locationDetail($slug)
    {
        $locale = app()->getLocale();
        $data = Location::with('service')->where('slug->'.$locale, $slug);
        if(!$data->exists()){
            $locale = app()->getLocale() === 'id' ? 'en' : 'id';
            $data = Location::with('service')->where('slug->'.$locale, $slug);
        }
        $view = $data->first();

        $isHeaderOverlay = false;
        $slug = 'location';
        $records = LocationHasSubservice::with(['service', 'subservice'])
            ->where('location_id', $view->id)
            ->get();

        $services = $records->groupBy(fn ($item) => $item->service?->getTranslation('title', $locale) ?? 'Unknown Service')
            ->map(fn ($group) => $group
                ->map(fn ($item) => $item->subservice?->getTranslation('title', $locale))
                ->filter() // remove nulls if any
                ->unique()
                ->values()
            );
        $meta = Speciality::whereIn('id', $view->about_speciality)->get()->map(fn ($item) => $item->getTranslation('title', $locale))->toArray();
        $title = $view['title'];

        $coeRecords = LocationHasCoe::with('coe')->where('location_id', $view->id)->get();
        $coe = $coeRecords->map(fn ($item) => $item->coe?->getTranslation('title', $locale))->unique()->values()->toArray();

        $specialityRecords = LocationHasSpeciality::with('speciality')->where('location_id', $view->id)->get();
        $speciality = $specialityRecords->map(fn ($item) => $item->speciality?->getTranslation('title', $locale))->unique()->values()->toArray();

        $facilitiesRecords = LocationHasFacilities::with('facilities')->where('location_id', $view->id)->get();
        $facilities = $facilitiesRecords->map(fn ($item) => $item->facilities?->getTranslation('title', $locale))->unique()->values()->toArray();

        $emergencyRecords = LocationHasEmergency::with('emergency')->where('location_id', $view->id)->get();
        $emergency = $emergencyRecords->map(fn ($item) => $item->emergency?->getTranslation('title', $locale))->unique()->values()->toArray();

        Session::flash('single_content', $view->toArray());

        return view('pages.location.single', compact('view', 'title', 'services', 'coe', 'meta', 'speciality', 'facilities', 'emergency', 'isHeaderOverlay', 'slug'));
    }
}
