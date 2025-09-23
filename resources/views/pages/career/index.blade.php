@extends('template')
@section('content')
    @filamentStyles()
    <div class="h-[700px] relative"
         style="background-image: url({{asset('asset/CareerPage/hero-career.jpg')}})">
        <div class="h-full relative" style="background: rgba(0,0,0,0.2)">
            <div class="absolute text-white max-w-screen-2xl mx-auto px-6 2xl:px-0 left-0 bottom-1/2 top-1/2 right-0">
                <h1 class="text-5xl text-white mb-4 font-semibold">Career</h1>
                <h3 class="text-white text-3xl">Join our team and make a difference
                </h3>
            </div>
        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto py-16 pb-24 px-6 2xl:px-0">
        <x-breadcrumb parent="Home" child="Career"/>
        <div class="mt-10 max-w-screen-lg mx-auto">
            <h2 class="text-3xl font-medium text-center">Build Your Career at Altius Hospitals</h2>
            <p class="text-center mt-6">
                Altius Hospitals continues to grow in its mission to provide the best healthcare services with a strong
                focus on patient comfort. We take pride in our team of skilled and dedicated professionals.
                Join us and be part of our journey!
            </p>
        </div>
        <div class="grid md:grid-cols-4 items-center gap-6 mt-10">
            @livewire('frontend.career.type-career')
            @livewire('frontend.career.department-career')
            <div class="md:col-span-2">
                @livewire('frontend.career.search-career')
            </div>
        </div>
        @livewire('frontend.career.list-career',[$data])
        <div class="mt-12 max-w-screen-lg mx-auto flex items-center flex-col gap-6 text-primary">
            <img src="{{asset('asset/CareerPage/Icon-Danger.svg')}}"/>
            <h2 class="text-3xl font-medium text-center">Beware of Recruitment Scams!</h2>
            <p class="text-center text-primary">
                It has come to our attention that fake job offers are being made, claiming to be from Altius Hospitals.
                Please be aware that Altius Hospitals does not require any payment from applicants seeking employment with us.
            </p>
        </div>
    </div>
    @filamentScripts()
@endsection
