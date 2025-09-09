@extends('template')
@section('content')
    <!-- Link Swiper's CSS -->
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
    <div class="swiper hero">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{asset('asset/Hero/slider-1.jpg')}}"/>
            </div>
            <div class="swiper-slide">
                <img src="{{asset('asset/Hero/slider-2.jpg')}}"/>
            </div>
        </div>
        <div class="hero-heading absolute bottom-0 left-0 right-0 z-50 mb-16">
            <div class="mx-auto w-full max-w-screen-2xl text-white">
                <h2 class="font-medium text-3xl">Welcome to Altius Hospitals</h2>
                <h1 class="font-semibold text-6xl">Your Health Is Our Priority</h1>
                <div class="swiper-pagination mt-4"></div>
                <div class="doctor-filter mt-6">
{{--                    @livewire('frontend.home.filter-doctor')--}}
                </div>
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
    </div>
    @include('home.section.about-us')
    @include('home.section.testimony')
@endsection
