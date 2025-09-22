@extends('template')
@section('content')
    @filamentStyles()
    <div class="h-[700px] relative"
         style="background-image: url({{asset('asset/doctor/hero-medical-profesional.jpg')}})">
        <div class="h-full relative" style="background: rgba(0,0,0,0.2)">
            <div class="absolute text-white max-w-screen-2xl mx-auto left-0 bottom-8 right-0">
                <h3 class="text-[24px] text-white font-semibold">Doctors and Medical Staff</h3>
                <x-typography.heading class="text-white">Explore Our Doctors by Using the Options Below
                </x-typography.heading>
            </div>
        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto py-16">
        <x-breadcrumb parent="Home" child="Medical Professionals"/>
            <div class="mt-10">
                <div class="grid grid-cols-3">
                    <div class="col-span-1">
                        @livewire('doctor.location-doctor')
                    </div>
                    <div class="col-span-2">
                        @livewire('doctor.search-doctor')
                        @livewire('doctor.list-doctors', ['data' => $data])
                    </div>
                </div>

            </div>
    </div>
    @filamentStyles()
@endsection
