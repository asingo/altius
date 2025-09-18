@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
        <div class="mt-8">
            <x-typography.subheading location="page">About Altius Hospitals</x-typography.subheading>
            <x-typography.heading location="page" class="mt-4">Altius Hospitals is a hospital built by doctors
                <br/>
                <span class="!text-primary">&mdash; with best practices in mind</span>
            </x-typography.heading>
        </div>
        <div>
            <img src="{{ asset('asset/hero-about.jpg') }}" alt="about" class="w-full rounded-2xl h-auto mt-10">
        </div>
        @include('pages.about.section.who-we-are')
        @include('pages.about.section.vision')
        @include('pages.about.section.more-about')
    </div>
@endsection
