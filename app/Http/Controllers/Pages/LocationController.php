<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\LocationHasCoe;
use App\Models\LocationHasEmergency;
use App\Models\LocationHasFacilities;
use App\Models\LocationHasSpeciality;
use App\Models\LocationHasSubservice;
use App\Models\Speciality;
use Illuminate\Http\Request;
use stdClass;
use function Laravel\Prompts\error;

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
                'image' => 'asset/Locations/SingleLocationPage/hero-altius-puri-indah.jpg',
                'thumbnail' => 'asset/Locations/LocationsPage/image-altius-hospitals-puri-indah.jpg',
                'link_maps' => '#',
                'link_contact' => '#',
                'general_number' => '021-3000 8877',
                'customer_care' => '0857 8877 8877',
                'description' => '<p>Altius Hospitals, established in 2023, is a multi-specialty general hospital located in Kota Harapan Indah, Bekasi.

We are a hospital founded by doctors and healthcare professionals, with the goal of providing patient-centered care.
</p><p>
We aim to be a leading healthcare provider,
focusing on patient experience and well-being.

We have three main clinical departments: Obstetrics and Gynecology + Pediatrics, Orthopedics, and Heart, Lung and Breathing</p>',
                'address' => 'Jl.  Harapan Indah Boulevard Sektor V, Pusaka Rakyat, Kec. Tarumajaya, Kab. Bekasi, Jawa Barat 17214',
                'services' => [
                    [
                        'name' => 'Center of Excellence (COE)',
                        'content' => [
                            'Cardiac Center',
                            'Woman & Children Center',
                            'Orthopedic Center'
                        ]
                    ],
                    [
                        'name' => 'Radiology Services',
                        'content' => [
                            'Bone Mineral Densitometry',
                            'Cath Lab',
                            'Computed Tomography (CT) Scan',
                            'Digital X-Ray',
                            'Ultrasound Scan',
                        ]
                    ],
                    [
                        'name' => 'Laboratory Services',
                        'content' => [
                            'Blood Bank',
                            'Clinical Histopathology',
                            'Clinical Microbiology',
                        ]
                    ],
                    [
                        'name' => 'Our Specialities',
                        'content' => [
                            'Pediatric',
                            'Cardiology',
                            'Orthopaedic',
                            'General Surgery',
                            'Obstetrics & Gynaecology (Obgyn)',
                            'ENT Specialist',
                            'Urology',
                            'Anesthesiologist',
                            'Pulmonologist',
                            'Internist',
                            'Radiologist',
                            'Neurologist',
                            'Dentist'
                        ]
                    ],
                    [
                        'name' => 'Facilities',
                        'content' => [
                            'IGD & Ambulances',
                            'NICU',
                            'PICU'
                        ]
                    ],
                    [
                        'name' => 'Emergency',
                        'content' => [
                            '24-Hour Emergency Department'
                        ]
                    ]
                ]
            ], [
                'id' => 2,
                'title' => 'Altius Hospitals Harapan Indah',
                'slug' => 'altius-hospitals-harapan-indah',
                'meta' => 'Cardiology, Orthopedic, Woman & Children',
                'image' => '',
                'thumbnail' => 'asset/Locations/LocationsPage/image-altius-hospitals-harapan-indah.jpg',
                'link_maps' => '#',
                'link_contact' => '#',
                'general_number' => '021-3000 8877',
                'customer_care' => '0857 8877 8877',
                'address' => 'Jl.  Harapan Indah Boulevard Sektor V, Pusaka Rakyat, Kec. Tarumajaya, Kab. Bekasi, Jawa Barat 17214',
                'description' => '<p>Altius Hospitals, established in 2023, is a multi-specialty general hospital located in Kota Harapan Indah, Bekasi.

We are a hospital founded by doctors and healthcare professionals, with the goal of providing patient-centered care.
</p><p>
We aim to be a leading healthcare provider,
focusing on patient experience and well-being.

We have three main clinical departments: Obstetrics and Gynecology + Pediatrics, Orthopedics, and Heart, Lung and Breathing</p>',
                'address' => 'Jl.  Harapan Indah Boulevard Sektor V, Pusaka Rakyat, Kec. Tarumajaya, Kab. Bekasi, Jawa Barat 17214',
                'services' => [
                    [
                        'name' => 'Center of Excellence (COE)',
                        'content' => [
                            'Cardiac Center',
                            'Woman & Children Center',
                            'Orthopedic Center'
                        ]
                    ],
                    [
                        'name' => 'Radiology Services',
                        'content' => [
                            'Bone Mineral Densitometry',
                            'Cath Lab',
                            'Computed Tomography (CT) Scan',
                            'Digital X-Ray',
                            'Ultrasound Scan',
                        ]
                    ],
                    [
                        'name' => 'Laboratory Services',
                        'content' => [
                            'Blood Bank',
                            'Clinical Histopathology',
                            'Clinical Microbiology',
                        ]
                    ],
                ]

            ], [
                'id' => 3,
                'title' => 'Altius Cardiac Clinic',
                'slug' => 'altius-cardiac-clinic',
                'meta' => 'Cardiology',
                'image' => '',
                'thumbnail' => 'asset/Locations/LocationsPage/image-altius-cardiac-clinic.jpg',
                'link_maps' => '#',
                'link_contact' => '#',
                'general_number' => '021-3000 8877',
                'customer_care' => '0857 8877 8877',
                'address' => 'Jl.  Harapan Indah Boulevard Sektor V, Pusaka Rakyat, Kec. Tarumajaya, Kab. Bekasi, Jawa Barat 17214',

            ]
        ];
    }

    public function location()
    {
        $isHeaderOverlay = false;
        $title = 'Our Locations';
        $slug = 'location';
        $data = Location::all();
        return view('pages.location.index', compact('isHeaderOverlay', 'title', 'slug', 'data'));
    }

    public function locationDetail($slug)
    {
        $view = Location::with('service')->where('slug->en', $slug)->first();

        $locale = 'en';
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
        $meta = Speciality::whereIn('id', $view->about_speciality)->get()->map(fn($item) => $item->getTranslation('title', $locale))->toArray();
        $title = $view['title'];

        $coeRecords = LocationHasCoe::with('coe')->where('location_id', $view->id)->get();
        $coe = $coeRecords->map(fn($item) => $item->coe?->getTranslation('title', $locale))->unique()->values()->toArray();

        $specialityRecords = LocationHasSpeciality::with('speciality')->where('location_id', $view->id)->get();
        $speciality = $specialityRecords->map(fn($item) => $item->speciality?->getTranslation('title', $locale))->unique()->values()->toArray();

        $facilitiesRecords = LocationHasFacilities::with('facilities')->where('location_id', $view->id)->get();
        $facilities = $facilitiesRecords->map(fn($item) => $item->facilities?->getTranslation('title', $locale))->unique()->values()->toArray();

        $emergencyRecords = LocationHasEmergency::with('emergency')->where('location_id', $view->id)->get();
        $emergency = $emergencyRecords->map(fn($item) => $item->emergency?->getTranslation('title', $locale))->unique()->values()->toArray();

        return view('pages.location.single', compact('view', 'title', 'services','coe', 'meta','speciality', 'facilities', 'emergency', 'isHeaderOverlay', 'slug'));
    }
}
