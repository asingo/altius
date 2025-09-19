<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
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
        $data = json_decode(json_encode($this->schema()));
        return view('pages.location.index', compact('isHeaderOverlay', 'title', 'slug', 'data'));
    }

    public function locationDetail($slug)
    {
        $data = collect($this->schema());
        if (!in_array($slug, $data->pluck('slug')->toArray())) {
            abort(404);
        }
        $view = $data->firstWhere('slug', $slug);
        $isHeaderOverlay = false;
        $slug = 'location';
        $title = $view['title'];
        return view('pages.location.single', compact('view', 'title', 'isHeaderOverlay', 'slug'));
    }
}
