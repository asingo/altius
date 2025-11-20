@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
        <div class="mt-8">
            <x-typography.subheading location="page">{{$title}}</x-typography.subheading>
            <x-typography.heading location="page" class="mt-4">{{$page->content['heading']['heading']}}
                <br/>
                <span class="!text-primary">&mdash; {{$page->content['heading']['colored_heading']}}</span>
            </x-typography.heading>
        </div>
        <div>
            <img src="{{ \Awcodes\Curator\Models\Media::find($page->image)?->url }}" alt="about" class="w-full rounded-2xl object-cover object-center h-auto mt-10 aspect-[4/3] sm:aspect-auto">
        </div>
        @include('pages.about.section.who-we-are')
        @include('pages.about.section.vision')
        @include('pages.about.section.more-about')
    </div>
@endsection
