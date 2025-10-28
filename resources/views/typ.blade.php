@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <div class="flex w-full flex-col gap-2 items-center">
            <img src="{{asset('asset/success.png')}}" alt="success"/>
            <h1 class="text-3xl font-semibold">{{$heading}}</h1>
            <div class="text-center">
                {!! $description !!}
            </div>
            <x-button.link href="/{{app()->getLocale() == 'en' ? '' : 'id'}}" class="mt-1">{{$buttonLabel}}</x-button.link>
        </div>

    </div>
@endsection
