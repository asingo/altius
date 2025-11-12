@extends('template')
@section('content')
    @filamentStyles()
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="{{__('Career')}}" subparentlink="{{localized_route('career')}}" child="{{$title}}"/>
        <div class="flex md:flex-row flex-col gap-12">
            <div class="md:w-1/2 mt-8 flex flex-col gap-6">

                <div class="flex flex-col gap-5">
                    <span class="text-lg text-textsub">{{__('Post on')}} {{\Carbon\Carbon::parse($view['created_at'])->translatedFormat('d F Y')}}</span>
                    <h1 class="text-5xl font-medium">{{$title}}</h1>

                </div>
                <div>
                    <h3 class="text-2xl font-medium">{{__('Qualification')}}</h3>
                    <div class="mt-4">
                        {!! tiptap_converter()->asHTML($view['qualification']) !!}
                    </div>
                </div> <div>
                    <h3 class="text-2xl font-medium">{{__('Description')}}</h3>
                    <div class="mt-4">
                        {!!tiptap_converter()->asHTML($view['description']) !!}
                    </div>
                </div> <div>
                    <h3 class="text-2xl font-medium">{{__('location')}}</h3>
                    <div class="mt-4">
                        <p>{{ $view->location->title}}</p>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 md:px-6 :px-12">
                @livewire('frontend.career.detail.submit-form', ['career' => $view->id])
            </div>
        </div>
        <div class="mt-24 max-w-screen-lg mx-auto flex items-center flex-col gap-6 text-primary">
            <img src="{{asset('asset/CareerPage/Icon-Danger.svg')}}"/>
            <h2 class="text-3xl font-medium text-center">{{$page->content['warning']['title']}}</h2>
            <p class="text-center text-primary">
                {{$page->content['warning']['description']}}
            </p>
        </div>
    </div>

    @filamentScripts()
@endsection
