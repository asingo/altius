<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}} - {{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<header x-data="{ atTop: @js(!$isHeaderOverlay), slug: '{{$slug}}' }"
        @if($isHeaderOverlay)
            @scroll.window="atTop = window.scrollY > 50;"
        @endif
        class="header text-[18px] fixed top-0 left-0 right-0 z-[99] pt-4 transition-all duration-500 ease-in-out px-6 2xl:px-0"
        :class="atTop && 'drop-shadow-lg' "
        :style="atTop ? {background: 'white'} : {background: 'linear-gradient(180deg,rgba(23, 23, 23, 0.8) 0%, rgba(23, 23, 23, 0) 100%)'}"
>
    <div class="flex items-center justify-between max-w-screen-2xl mx-auto border-b border-white pb-4">
        <div class="header-left">
            <a href="/">
                <img :class="!atTop && 'brightness-0 invert' " class="w-[150px] lg:w-[220px]"
                     src="{{asset('asset/logo.png')}}" alt="">
            </a>
        </div>
        <nav class="menu xl:flex hidden">
            <ul class="flex items-center gap-6 {{!$isHeaderOverlay ?'!text-[#171717]' : 'text-white'}}"
                :class="atTop && '!text-[#171717]' ">
                <li>
                    <a href="{{route('about')}}" class="relative group">
                        <span :class="[atTop && 'hover:!text-primary', slug == 'about' ? '!text-primary' : ''] ">About Us</span>
                        <span class="menu-interaction" :class="[atTop && '!bg-primary', slug == 'about' ? '!bg-primary !scale-x-100' :'']"></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('location')}}" class="relative group">
                        <span :class="[atTop && 'hover:!text-primary', slug == 'location' ? '!text-primary' : ''] ">Location</span>
                        <span class="menu-interaction":class="[atTop && '!bg-primary', slug == 'location' ? '!bg-primary !scale-x-100' :'']"></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="relative group">
                        <span :class="atTop && 'hover:!text-primary' ">Medical Professionals</span>
                        <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="relative group">
                        <span :class="atTop && 'hover:!text-primary' ">Health Screening</span>
                        <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="relative group">
                        <span :class="atTop && 'hover:!text-primary' ">Contact Us</span>
                        <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="relative group">
                        <span class="flex gap-2 items-center" :class="atTop && 'hover:!text-primary' ">
                            <svg width="20" height="20" viewBox="0 0 20 20" class="fill-white"
                                 :class="atTop && '!fill-red-500' "
                                 xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.3642 6.84333L11.2106 5H8.51919L8.36558 6.84333H5.3172L2 10.824V14.8311H3.75412C3.95525 15.5395 4.60749 16.06 5.37944 16.06C6.1514 16.06 6.8036 15.5395 7.00477 14.8311H12.725C12.9261 15.5395 13.5784 16.06 14.3503 16.06C15.1223 16.06 15.7745 15.5395 15.9757 14.8311H17.7298V6.84333H11.3642ZM5.37944 15.1383C4.95594 15.1383 4.61139 14.7938 4.61139 14.3703C4.61139 13.9468 4.95594 13.6022 5.37944 13.6022C5.80295 13.6022 6.1475 13.9468 6.1475 14.3703C6.1475 14.7938 5.80295 15.1383 5.37944 15.1383ZM7.22278 10.53H3.44474L5.74891 7.765H7.22278V10.53ZM9.29045 6.84333L9.36725 5.92167H10.3625L10.4393 6.84333H9.29045ZM13.4287 11.7589H12.507V10.8372H11.5853V9.91556H12.507V8.99389H13.4287V9.91556H14.3503V10.8372H13.4287V11.7589ZM14.3503 15.1383C13.9268 15.1383 13.5823 14.7938 13.5823 14.3703C13.5823 13.9468 13.9268 13.6022 14.3503 13.6022C14.7738 13.6022 15.1184 13.9468 15.1184 14.3703C15.1184 14.7938 14.7738 15.1383 14.3503 15.1383Z"
/>
</svg>

                            Emergency 564 123</span>
                        <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="header-right flex items-center gap-2 sm:gap-4">
            <div x-data="{ open: false, selected: 'EN' }" class="relative inline-block text-left">
                <!-- Trigger Button -->
                <button
                    @click="open = !open"
                    class="flex items-center gap-1.5 sm:px-4 py-2 text-white text-sm sm:text-[16px]"
                    :class="atTop && '!text-[#171717]' "
                >
                    <span x-text="selected"></span>
                    <svg :class="{'rotate-180': open}" class="w-5 h-5 stroke-1.5 transform transition-transform"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition
                    class="absolute right-0 mt-2 w-[100px] bg-white rounded-lg shadow-lg z-50"
                >
                    <ul class="py-2">
                        <li>
                            <a href="#"
                               @click.prevent="selected = 'EN'; open = false"
                               class="block px-4 py-2 hover:bg-gray-100">
                                EN
                            </a>
                        </li>
                        <li>
                            <a href="#"
                               @click.prevent="selected = 'ID'; open = false"
                               class="block px-4 py-2 hover:bg-gray-100">
                                ID
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="#" class="btn-outline text-sm sm:text-[16px]" :class="atTop && 'btn-outline-alt' ">
                <x-heroicon-o-user-circle class="w-5 h-5"/>
                Login
            </a>
            <div x-data="{open:false}" class="flex xl:hidden items-center">
                <button class="text-white" :class="atTop && '!text-[#171717]'" @click="open = !open; atTop = !atTop">
                    <x-heroicon-o-bars-3 class="w-6 h-6"/>
                </button>

                <div
                    x-show="open"
                    @click.outside="open = false"
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 -translate-y-5"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-500"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-5"
                    class="absolute bg-white w-screen left-0 h-screen top-14 z-50"
                >
                    <ul class="flex flex-col gap-5 mx-6 mt-4 pt-4 border-t">
                        <li>
                            <a href="{{route('about')}}" class="relative group">
                                <span :class="atTop && 'hover:!text-primary' ">About Us</span>
                                <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('location')}}" class="relative group">
                                <span :class="atTop && 'hover:!text-primary' ">Location</span>
                                <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home')}}" class="relative group">
                                <span :class="atTop && 'hover:!text-primary' ">Medical Professionals</span>
                                <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home')}}" class="relative group">
                                <span :class="atTop && 'hover:!text-primary' ">Health Screening</span>
                                <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home')}}" class="relative group">
                                <span :class="atTop && 'hover:!text-primary' ">Contact Us</span>
                                <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('home')}}" class="relative group">
                        <span class="flex gap-2 items-center" :class="atTop && 'hover:!text-primary' ">
                            <svg width="20" height="20" viewBox="0 0 20 20" class="fill-white"
                                 :class="atTop && '!fill-red-500' "
                                 xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.3642 6.84333L11.2106 5H8.51919L8.36558 6.84333H5.3172L2 10.824V14.8311H3.75412C3.95525 15.5395 4.60749 16.06 5.37944 16.06C6.1514 16.06 6.8036 15.5395 7.00477 14.8311H12.725C12.9261 15.5395 13.5784 16.06 14.3503 16.06C15.1223 16.06 15.7745 15.5395 15.9757 14.8311H17.7298V6.84333H11.3642ZM5.37944 15.1383C4.95594 15.1383 4.61139 14.7938 4.61139 14.3703C4.61139 13.9468 4.95594 13.6022 5.37944 13.6022C5.80295 13.6022 6.1475 13.9468 6.1475 14.3703C6.1475 14.7938 5.80295 15.1383 5.37944 15.1383ZM7.22278 10.53H3.44474L5.74891 7.765H7.22278V10.53ZM9.29045 6.84333L9.36725 5.92167H10.3625L10.4393 6.84333H9.29045ZM13.4287 11.7589H12.507V10.8372H11.5853V9.91556H12.507V8.99389H13.4287V9.91556H14.3503V10.8372H13.4287V11.7589ZM14.3503 15.1383C13.9268 15.1383 13.5823 14.7938 13.5823 14.3703C13.5823 13.9468 13.9268 13.6022 14.3503 13.6022C14.7738 13.6022 15.1184 13.9468 15.1184 14.3703C15.1184 14.7938 14.7738 15.1383 14.3503 15.1383Z"
/>
</svg>

                            Emergency 564 123</span>
                                <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</header>
@yield('content')
<footer>
    <div class="bg-[#012D61] py-16 px-6 2xl:px-0">
        <div
            class="max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-white/20 text-center">

            <!-- Contact Us -->
            <div class="flex flex-col items-center p-6 space-y-3 text-white">
                <div class="">
                    <x-heroicon-s-envelope class="w-10 h-10 fill-white"/>
                </div>
                <span class="text-[24px]">Contact Us</span>
                <span class="text-[20px]">care@altiushospitals.id</span>
            </div>

            <!-- Call Us -->
            <div class="flex flex-col items-center p-6 space-y-3 text-white">
                <div>
                    <x-heroicon-s-phone class="w-10 h-10 fill-white"/>
                </div>
                <span class="text-[24px]">Call Us</span>
                <span class="text-[20px]">021 - 3000 8877 Available 24/7</span>
            </div>

            <!-- Whatsapp -->
            <div class="flex flex-col items-center p-6 space-y-3 text-white">
                <div>

                    <svg class="w-10 h-10 " version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                         xmlns:xlink="http://www.w3.org/1999/xlink"
                         viewBox="0 0 58 58" xml:space="preserve">
<g>
    <path style="fill:#ffffff;" d="M0,58l4.988-14.963C2.457,38.78,1,33.812,1,28.5C1,12.76,13.76,0,29.5,0S58,12.76,58,28.5
		S45.24,57,29.5,57c-4.789,0-9.299-1.187-13.26-3.273L0,58z"/>
    <path style="fill:#012d61;" d="M47.683,37.985c-1.316-2.487-6.169-5.331-6.169-5.331c-1.098-0.626-2.423-0.696-3.049,0.42
		c0,0-1.577,1.891-1.978,2.163c-1.832,1.241-3.529,1.193-5.242-0.52l-3.981-3.981l-3.981-3.981c-1.713-1.713-1.761-3.41-0.52-5.242
		c0.272-0.401,2.163-1.978,2.163-1.978c1.116-0.627,1.046-1.951,0.42-3.049c0,0-2.844-4.853-5.331-6.169
		c-1.058-0.56-2.357-0.364-3.203,0.482l-1.758,1.758c-5.577,5.577-2.831,11.873,2.746,17.45l5.097,5.097l5.097,5.097
		c5.577,5.577,11.873,8.323,17.45,2.746l1.758-1.758C48.048,40.341,48.243,39.042,47.683,37.985z"/>
</g>
</svg>
                </div>
                <span class="text-[24px]">WhatsApp</span>
                <span class="text-[20px]">0857 8877 8877 Available 24/7</span>
            </div>

            <!-- Visit -->
            <div class="flex flex-col items-center p-6 space-y-3 text-white">
                <div>
                    <x-heroicon-s-map-pin class="w-10 h-10 fill-white"/>
                </div>
                <span class="text-[24px]">Visit our Hospitals</span>
                <x-button.link href="#" outlined="true" class="text-sm !font-normal !py-2 !px-4">Get Directions
                </x-button.link>
            </div>

        </div>
        <div class="max-w-screen-2xl mx-auto mt-6">
            <div class="flex justify-between md:flex-row flex-col gap-6 items-center">
                <div class="flex items-center md:items-start flex-col">
                    <span class="text-[24px] text-white font-semibold ">Follow Altius Hospitals</span>
                    <div class="flex gap-2 h-12 mt-4 items-center">
                        <div class="border w-12 h-12 border-white p-2.5 rounded-full">
                            <img src="{{asset('asset/Icon/instagram.svg')}}">
                        </div>
                        <div class="border w-12 h-12 border-white p-2.5 rounded-full">
                            <img src="{{asset('asset/Icon/youtube.svg')}}">
                        </div>
                        <div class="border w-12 h-12 border-white p-2.5 rounded-full">
                            <img src="{{asset('asset/Icon/tiktok.svg')}}">
                        </div>
                    </div>
                </div>
                <div class="flex items-center md:items-end flex-col">
                    <span class="text-[24px] text-white font-semibold ">About Altius Hospitals</span>
                    <nav class="menu-footer mt-4">
                        <ul class="flex md:h-12 text-lg items-center md:flex-row flex-col gap-6 text-white">
                            <li>
                                <a href="{{route('home')}}" class="relative group">
                                    <span>Medical Professionals</span>
                                    <span class="menu-interaction"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('home')}}" class="relative group">
                                    <span>Health Screening</span>
                                    <span class="menu-interaction"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('home')}}" class="relative group">
                                    <span>Careers</span>
                                    <span class="menu-interaction"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('home')}}" class="relative group">
                                    <span>News</span>
                                    <span class="menu-interaction"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('home')}}" class="relative group">
                                    <span>Offers</span>
                                    <span class="menu-interaction"></span>
                                </a>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#D5E3F6]">
        <div class="max-w-screen-2xl mx-auto py-4 px-6 2xl:px-0">
            <div class="flex justify-between md:flex-row text-lg flex-col gap-6 items-center">
                <div>
                    <span>&copy; {{date('Y')}} Altius Hospitals. All rights reserved</span>
                </div>
                <div class="flex gap-8 md:gap-4">
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
