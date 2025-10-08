@php use App\Models\Media; @endphp
@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
        <div class="mt-8">
            <x-typography.subheading location="page">Our Locations</x-typography.subheading>
            <x-typography.heading location="page">Find an Altius Hospital near you
            </x-typography.heading>
        </div>
        <div class="flex flex-col gap-10 mt-8 md:mt-14">
            @dump($data)
            @foreach($data as $v)
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-10 gap-3">
                    <div>

                        <x-image :id="$v->id" :class="'rounded-xl w-full object-cover'"/>
{{--                        <img class="rounded-xl w-full object-cover" src="{{asset($v->thumbnail)}}" alt=""/>--}}
                    </div>
                    <div class="flex flex-col gap-3 md:gap-5">
                        <h3 class="text-2xl md:text-3xl text-textsub font-semibold">{{$v->title}}</h3>
                        <div class="text-textsub text-lg md:text-xl">{{$v->meta}}</div>
                        <a href="{{$v->link_maps}}" class="text-primary hover:text-accent gap-2 items-center text-lg flex">
                            <x-heroicon-s-map-pin class="w-7 h-7"/>
                            <span>Building & Maps</span>
                            <x-heroicon-o-chevron-right class="w-7 h-7"/>
                        </a> <a href="tel:{{filter_var($v->general_number, FILTER_SANITIZE_NUMBER_INT)}}" class="text-primary hover:text-accent gap-2 items-center text-lg flex">
                            <x-heroicon-s-phone class="w-7 h-7"/>
                            <span>Contact Us</span>
                            <x-heroicon-o-chevron-right class="w-7 h-7"/>
                        </a>
                        <x-button.link class="mt-2" href="{{request()->url().'/'.$v->slug}}">See Location</x-button.link>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
