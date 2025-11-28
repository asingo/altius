@extends('template')
@section('content')
    <!-- Link Swiper's CSS -->
    @filamentStyles()
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .hero img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        .swiper-pagination {
            position: unset;
            text-align: left;
        }

        .swiper-pagination .swiper-pagination-bullet {
            width: 80px;
            height: 4px;
            background-color: white;
            border-radius: unset;
        }
    </style>
    <!-- Swiper -->
    <div class="swiper hero !z-20 relative">
        <div class="swiper-wrapper">
            @if(!$sliderSetting->value['is_video'])
            @foreach($slider as $s)
                @php
                    $media = \Awcodes\Curator\Models\Media::find($s->image);
                @endphp

                <div class="swiper-slide">
                    <img src="{{asset($media->url)}}" title="{{$media->title}}" alt="{{$media->alt}}"/>
                    @if($sliderSetting->value['is_item_text'])
                    <div class="hero-heading absolute bottom-0 left-0 right-0 z-50 mb-[14rem] lg:mb-[18rem]">
                        <div class="mx-auto w-full max-w-screen-2xl text-white px-6 2xl:px-0">
                            <h3 class="font-medium">{{$s->description}}</h3>
                            <h1 class="font-semibold">{{$s->title}}</h1>
                        </div>
                    </div>
                    @endif
                </div>
            @endforeach
            @else
            <div class="swiper-slide">
                <video width="100%" autoplay loop muted class="h-screen object-cover">
                    <source src="{{\Awcodes\Curator\Models\Media::find(is_array($sliderSetting->value['video']) ? $sliderSetting->value['video'][0] : $sliderSetting->value['video'])?->url}}" type="video/mp4">
                </video>
            </div>
            @endif
        </div>
        <div class="hero-heading absolute bottom-[25vh] md:bottom-[30vh] left-0 right-0 z-50" >
            <div class="mx-auto w-full max-w-screen-2xl text-white px-6 2xl:px-0">
                @if(!$sliderSetting->value['is_item_text'])
                <h3 class="font-medium">{{$sliderSetting->value['description_en']}}</h3>
                <h1 class="font-semibold">{{$sliderSetting->value['heading_en']}}</h1>
                @endif
                <div class="swiper-pagination mt-4"></div>
            </div>
        </div>
    </div>


    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".hero", {
            spaceBetween: 0,
            speed: 1300,
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
    <div
        class="doctor-filter -mt-32 lg:mt-6 relative mx-6 lg:absolute bottom-12 left-0 right-0 z-50 max-w-screen-2xl 2xl:mx-auto">
        @livewire('frontend.home.filter-doctor')
    </div>
    @include('pages.home.section.about-us')
    @include('pages.home.section.testimony')
    {{--    Section Background--}}
    <div>
        <img class="h-[100vw] sm:h-full object-cover" src="{{asset('asset/image-home.jpg')}}">
    </div>
    {{--/    Section Background--}}
    @include('pages.home.section.health-screening')
    @include('pages.home.section.offers')
    @filamentScripts
@endsection
