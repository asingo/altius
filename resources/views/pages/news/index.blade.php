@php use Awcodes\Curator\Models\Media; @endphp
@extends('template')
@section('content')
    <div class="h-[700px] relative"
         style="background-image: url({{Media::find($page->image)->url}}); background-position: center center; background-size: cover;">
        <div class="h-full relative" style="background: rgba(0,0,0,0.2)">
            <div class="absolute text-white max-w-screen-2xl mx-auto px-6 2xl:px-0 left-0 bottom-1/2 top-1/2 right-0">
                <h1 class="text-5xl text-white mb-4 font-semibold">{{$page->content['section']['heading']}}</h1>
                <h3 class="text-white text-3xl">{{$page->content['section']['subheading']}}
                </h3>
            </div>
        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto py-16 px-6 2xl:px-0">
        <x-breadcrumb parent="Home" child="{{$title}}"/>
        <div class="mt-10">
            <h3 class="text-3xl font-heading">{{$page->content['body']['heading']}}</h3>
            <p class="text-2xl mt-2">{{$page->content['body']['subheading']}}</p>
            <div class="mt-10">
                @livewire('news.list-news', [$data])
            </div>
        </div>
    </div>
@endsection
