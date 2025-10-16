@extends('template')
@section('content')
    @filamentStyles()
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="Career" subparentlink="/career" child="{{$title}}"/>
        <div class="flex md:flex-row flex-col gap-12">
            <div class="md:w-1/2 mt-8 flex flex-col gap-6">

                <div class="flex flex-col gap-5">
                    <span class="text-lg text-textsub">Post on {{\Carbon\Carbon::parse($view['created_at'])->format('d F Y')}}</span>
                    <h1 class="text-5xl font-medium">{{$title}}</h1>

                </div>
                <div>
                    <h3 class="text-2xl font-medium">Qualification</h3>
                    <div class="mt-4">
                        {!! $view['qualification'] !!}
                    </div>
                </div> <div>
                    <h3 class="text-2xl font-medium">Description</h3>
                    <div class="mt-4">
                        {!! $view['description'] !!}
                    </div>
                </div> <div>
                    <h3 class="text-2xl font-medium">Location</h3>
                    <div class="mt-4">
                        <p>{{ $view->location->title}}</p>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 md:px-6 :px-12">
                @livewire('frontend.career.detail.submit-form')
            </div>
        </div>
        <div class="mt-24 max-w-screen-lg mx-auto flex items-center flex-col gap-6 text-primary">
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
