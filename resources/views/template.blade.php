@php
    $setting = \App\Models\Setting::where('name','general')->first()?->value;
@endphp
    <!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if($setting['site']['is_no_robots'])
        <meta name="robots" content="noindex, nofollow">
    @endif
    <link rel="icon" href="{{ \Awcodes\Curator\Models\Media::find($setting['site']['favicon'])?->url }}"
          type="image/x-icon">
    <title>{{$title}} - {{env('APP_NAME')}}</title>
    @filamentStyles()
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body x-data="{openFeedback: false}">

<header x-data="{ atTop: @js(!$isHeaderOverlay), slug: '{{$slug}}',topStatus: null,
        openMobile: false}"
        @if($isHeaderOverlay)
            @scroll.window="if (!openMobile) atTop = window.scrollY > 50;"
        @endif
        x-effect="
        if (openMobile) {
            topStatus = atTop;
            atTop = true;
        } else if (topStatus !== null) {
            atTop = topStatus;
        }"
        class="header text-[18px] fixed top-0 left-0 right-0 z-[99] pt-4 transition-all duration-500 ease-in-out px-6 2xl:px-0"
        :class="atTop && 'drop-shadow-lg' "
        :style="atTop ? {background: 'white'} : {background: 'linear-gradient(180deg,rgba(23, 23, 23, 0.8) 0%, rgba(23, 23, 23, 0) 100%)'}"
>
    <div class="flex items-center justify-between max-w-screen-2xl mx-auto border-b border-white pb-4">
        <div class="header-left">
            <a href="{{localized_route('home')}}">
                <img :class="!atTop && 'brightness-0 invert' " class="w-[150px] lg:w-[220px]"
                     src="{{\Awcodes\Curator\Models\Media::find($setting['site']['logo_primary'])?->url}}" alt="">
            </a>
        </div>
        <nav class="menu xl:flex hidden">
            <ul class="menu-list flex items-center gap-6 {{!$isHeaderOverlay ?'!text-[#171717]' : 'text-white'}}"
                :class="atTop && '!text-[#171717]' ">
                @foreach(\App\Models\MenuHeader::with('pages')->get() as $menu)
                    <li>
                        <a href="{{localized_route($menu->pages->route_name)}}" class="relative group w-full menu-item">
                            <span
                                :class="[atTop && 'hover:!text-primary', slug == '{{$menu->pages->slug}}' ? '!text-primary' : '']">{{$menu->title}}</span>
                            <span class="menu-interaction"
                                  :class="[atTop && '!bg-primary', slug == '{{$menu->pages->slug}}' ? '!bg-primary !scale-x-100' :'']"></span>
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="tel:021{{$setting['contact']['emergency']}}" class="relative group menu-item">
                        <span class="flex gap-2 items-center" :class="atTop && 'hover:!text-primary' ">
                            <svg width="20" height="20" viewBox="0 0 20 20" class="fill-white"
                                 :class="atTop && '!fill-red-500' "
                                 xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.3642 6.84333L11.2106 5H8.51919L8.36558 6.84333H5.3172L2 10.824V14.8311H3.75412C3.95525 15.5395 4.60749 16.06 5.37944 16.06C6.1514 16.06 6.8036 15.5395 7.00477 14.8311H12.725C12.9261 15.5395 13.5784 16.06 14.3503 16.06C15.1223 16.06 15.7745 15.5395 15.9757 14.8311H17.7298V6.84333H11.3642ZM5.37944 15.1383C4.95594 15.1383 4.61139 14.7938 4.61139 14.3703C4.61139 13.9468 4.95594 13.6022 5.37944 13.6022C5.80295 13.6022 6.1475 13.9468 6.1475 14.3703C6.1475 14.7938 5.80295 15.1383 5.37944 15.1383ZM7.22278 10.53H3.44474L5.74891 7.765H7.22278V10.53ZM9.29045 6.84333L9.36725 5.92167H10.3625L10.4393 6.84333H9.29045ZM13.4287 11.7589H12.507V10.8372H11.5853V9.91556H12.507V8.99389H13.4287V9.91556H14.3503V10.8372H13.4287V11.7589ZM14.3503 15.1383C13.9268 15.1383 13.5823 14.7938 13.5823 14.3703C13.5823 13.9468 13.9268 13.6022 14.3503 13.6022C14.7738 13.6022 15.1184 13.9468 15.1184 14.3703C15.1184 14.7938 14.7738 15.1383 14.3503 15.1383Z"
/>
</svg>

                            Emergency {{$setting['contact']['emergency']}}</span>
                        <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="header-right flex items-center gap-2 sm:gap-4 relative" x-data="{openProfile: false, hoverTimer: null}">
            @livewire('language-switcher')
            <a   x-on:mouseenter="clearTimeout(hoverTimer); openProfile = true"
                 x-on:mouseleave="hoverTimer = setTimeout(() => openProfile = false, 200)"
                href="{{auth()->check() ? localized_route('profile') :localized_route('login')}}" class="btn-outline text-sm sm:text-[16px]" :class="atTop && 'btn-outline-alt' ">
                <x-heroicon-o-user-circle class="w-5 h-5"/>
                {{auth()->user() ? auth()->user()->first_name : __('login')}}

            </a>
            @if(auth()->check())
            <div x-show="openProfile"
                 x-on:mouseenter="clearTimeout(hoverTimer); openProfile = true"
                 x-on:mouseleave="hoverTimer = setTimeout(() => openProfile = false, 200)"
                 x-cloak x-transition:enter="transition ease-out duration-500"
                 class="absolute -bottom-[7rem] shadow right-0 py-2 px-4 bg-white rounded-2xl w-48 flex flex-col">
                <div class="flex w-full items-center gap-4 border-b pb-2">

                    <x-filament::avatar
                                         src="https://ui-avatars.com/api/?name={{substr(auth()->user()->first_name,0,1)}}&color=FFFFFF&background=225CA8"
                    />
                    <div class="flex flex-col">
                        <span class="!text-sm">Hi,</span>
                        <div class="font-medium text-md">{{auth()->user()->first_name}}</div>
                    </div>
                </div>
                <a href="{{route('logout')}}" class="text-danger-500 flex py-2 !text-[16px] items-center gap-2"><x-heroicon-o-power class="w-5 h-5"/> Logout</a>
            </div>
            @endif

            <div class="flex xl:hidden items-center">
                <button class="text-white" :class="atTop && '!text-[#171717]'" @click="openMobile = !openMobile">
                    <x-heroicon-o-bars-3 class="w-6 h-6"/>
                </button>


            </div>


        </div>
    </div>
    <div
        x-show="openMobile"
        x-cloak
        @click.outside="openMobile = false"
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 -translate-y-5"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-500"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-5"
        class="absolute bg-white w-screen left-0 h-screen top-14 z-50"
    >
        <ul class="menu-list flex flex-col gap-5 mx-6 mt-4 pt-4 border-t">
            @foreach(\App\Models\MenuHeader::with('pages')->get() as $menu)
                <li>
                    <a href="{{localized_route($menu->pages->route_name)}}" class="relative group w-full menu-item">
                                    <span
                                        :class="[atTop && 'hover:!text-primary', slug == '{{$menu->pages->slug}}' ? '!text-primary' : '']">{{$menu->title}}</span>
                        <span class="menu-interaction"
                              :class="[atTop && '!bg-primary', slug == '{{$menu->pages->slug}}' ? '!bg-primary !scale-x-100' :'']"></span>
                    </a>
                </li>
            @endforeach
            {{--                        <li>--}}
            {{--                            <a href="{{localized_route('about')}}" class="relative group w-full">--}}
            {{--                                <span :class="[atTop && 'hover:!text-primary', slug == 'about' ? '!text-primary' : '']">About Us</span>--}}
            {{--                                <span class="menu-interaction" :class="[atTop && '!bg-primary', slug == 'about' ? '!bg-primary !scale-x-100' :'']"></span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="{{localized_route('location')}}" class="relative group">--}}
            {{--                                <span :class="[atTop && 'hover:!text-primary', slug == 'location' ? '!text-primary' : '']">Location</span>--}}
            {{--                                <span class="menu-interaction" :class="[atTop && '!bg-primary', slug == 'location' ? '!bg-primary !scale-x-100' :'']"></span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="{{localized_route('doctor')}}" class="relative group">--}}
            {{--                                <span :class="[atTop && 'hover:!text-primary', slug == 'medical-professional' ? '!text-primary' : '']">Medical Professionals</span>--}}
            {{--                                <span class="menu-interaction" :class="[atTop && '!bg-primary', slug == 'medical-professional' ? '!bg-primary !scale-x-100' :'']"></span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="{{localized_route('screening')}}" class="relative group">--}}
            {{--                                <span :class="[atTop && 'hover:!text-primary', slug == 'health-screening' ? '!text-primary' : '']">Health Screening</span>--}}
            {{--                                <span class="menu-interaction" :class="[atTop && '!bg-primary', slug == 'health-screening' ? '!bg-primary !scale-x-100' :'']"></span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            {{--                        <li>--}}
            {{--                            <a href="{{localized_route('contact')}}" class="relative group">--}}
            {{--                                <span :class="[atTop && 'hover:!text-primary', slug == 'contact-us' ? '!text-primary' : '']">Contact Us</span>--}}
            {{--                                <span class="menu-interaction" :class="[atTop && '!bg-primary', slug == 'contact-us' ? '!bg-primary !scale-x-100' :'']"></span>--}}
            {{--                            </a>--}}
            {{--                        </li>--}}
            <li>
                <a href="tel:021{{$setting['contact']['emergency']}}" class="relative group menu-item">
                        <span class="flex gap-2 items-center" :class="atTop && 'hover:!text-primary' ">
                            <svg width="20" height="20" viewBox="0 0 20 20" class="fill-white"
                                 :class="atTop && '!fill-red-500' "
                                 xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.3642 6.84333L11.2106 5H8.51919L8.36558 6.84333H5.3172L2 10.824V14.8311H3.75412C3.95525 15.5395 4.60749 16.06 5.37944 16.06C6.1514 16.06 6.8036 15.5395 7.00477 14.8311H12.725C12.9261 15.5395 13.5784 16.06 14.3503 16.06C15.1223 16.06 15.7745 15.5395 15.9757 14.8311H17.7298V6.84333H11.3642ZM5.37944 15.1383C4.95594 15.1383 4.61139 14.7938 4.61139 14.3703C4.61139 13.9468 4.95594 13.6022 5.37944 13.6022C5.80295 13.6022 6.1475 13.9468 6.1475 14.3703C6.1475 14.7938 5.80295 15.1383 5.37944 15.1383ZM7.22278 10.53H3.44474L5.74891 7.765H7.22278V10.53ZM9.29045 6.84333L9.36725 5.92167H10.3625L10.4393 6.84333H9.29045ZM13.4287 11.7589H12.507V10.8372H11.5853V9.91556H12.507V8.99389H13.4287V9.91556H14.3503V10.8372H13.4287V11.7589ZM14.3503 15.1383C13.9268 15.1383 13.5823 14.7938 13.5823 14.3703C13.5823 13.9468 13.9268 13.6022 14.3503 13.6022C14.7738 13.6022 15.1184 13.9468 15.1184 14.3703C15.1184 14.7938 14.7738 15.1383 14.3503 15.1383Z"
/>
</svg>

                            Emergency {{$setting['contact']['emergency']}}</span>
                    <span class="menu-interaction" :class="atTop && '!bg-primary' "></span>
                </a>
            </li>
        </ul>
    </div>
</header>
@yield('content')
@php
    $generalSetting = \App\Models\Setting::where('name', 'general')->first()?->value ?? false;
@endphp
<footer>
    <div class="bg-[#012D61] py-16 px-6 2xl:px-0">
        <div
            class="max-w-screen-2xl mx-auto grid grid-cols-1 md:grid-cols-4 divide-y md:divide-y-0 md:divide-x divide-white/20 text-center">

            <!-- Contact Us -->
            <div class="flex flex-col items-center p-6 space-y-3 text-white">
                <div class="">
                    <x-heroicon-s-envelope class="w-10 h-10 fill-white"/>
                </div>
                <span class="text-[24px]">{{__('footer.contact')}}</span>
                <a href="mailto:{{$generalSetting ? $generalSetting['contact']['email'] : 'care@altiushospitals.id'}}" class="!text-white group menu-item relative">
                      <span
                          class="text-[20px] !text-white">{{$generalSetting ? $generalSetting['contact']['email'] : 'care@altiushospitals.id'}}</span>
                    <span class="menu-interaction"></span>
                </a>

            </div>

            <!-- Call Us -->
            <div class="flex flex-col items-center p-6 space-y-3 text-white">
                <div>
                    <x-heroicon-s-phone class="w-10 h-10 fill-white"/>
                </div>
                <span class="text-[24px]">{{__('footer.call')}}</span>
                <a href="tel:{{$generalSetting ? $generalSetting['contact']['phone'] : '021 - 3000 8877'}}" class="!text-white group menu-item relative">

                <span class="text-[20px]">{{$generalSetting ? $generalSetting['contact']['phone'] : '021 - 3000 8877'}} Available 24/7</span>
                    <span class="menu-interaction"></span>
                </a>
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
                <a href="https://wa.me/{{str_replace(' ', '', $generalSetting ? $generalSetting['contact']['whatsapp'] : '0857 8877 8877')}}" class="!text-white group menu-item relative">

                <span class="text-[20px]">{{$generalSetting ? $generalSetting['contact']['whatsapp'] : '0857 8877 8877'}} Available 24/7</span>
                    <span class="menu-interaction"></span>
                </a>
            </div>

            <!-- Visit -->
            <div class="flex flex-col items-center p-6 space-y-3 text-white">
                <div>
                    <x-heroicon-s-map-pin class="w-10 h-10 fill-white"/>
                </div>
                <span class="text-[24px]">{{__('visit.hospitals')}}</span>
                <x-button.link href="{{$generalSetting ? $generalSetting['contact']['link_maps'] : '#'}}" newTab="_blank"
                               outlined="true" class="text-sm !font-normal !py-2 !px-4">{{__('get.directions')}}
                </x-button.link>
            </div>

        </div>
        <div class="max-w-screen-2xl mx-auto mt-6">
            <div class="flex justify-between md:flex-row flex-col gap-6 items-center">
                <div class="flex items-center md:items-start flex-col">
                    <span class="text-[24px] text-white font-semibold ">{{__('follow.altius')}}</span>
                    <div class="flex gap-2 h-12 mt-4 items-center">
                        @foreach($generalSetting['contact']['social_media'] as $socmed)
                            <a href="{{$socmed['link']}}" target="_blank">
                                <div class="border w-12 h-12 border-white p-2.5 rounded-full group hover:bg-white transition-all duration-300 ease-in-out">
                                    <img class=" group-hover:[filter:invert(96%)_sepia(91%)_saturate(6200%)_hue-rotate(200deg)_brightness(145%)_contrast(100%)]" src="{{\Awcodes\Curator\Models\Media::find($socmed['icon'])?->url}}">
                                </div>
                            </a>
                        @endforeach

                        {{--                        <a href="#">--}}
                        {{--                            <div class="border w-12 h-12 border-white p-2.5 rounded-full">--}}
                        {{--                                <img src="{{asset('asset/Icon/youtube.svg')}}">--}}
                        {{--                            </div>--}}
                        {{--                        </a>--}}
                        {{--                        <a href="#">--}}
                        {{--                            <div class="border w-12 h-12 border-white p-2.5 rounded-full">--}}
                        {{--                                <img src="{{asset('asset/Icon/tiktok.svg')}}">--}}
                        {{--                            </div>--}}
                        {{--                        </a>--}}
                    </div>
                </div>
                <div class="flex items-center md:items-end flex-col">
                    <span class="text-[24px] text-white font-semibold ">{{__('about.altius')}}</span>
                    <nav class="menu-footer mt-4">
                        <ul class="menu-list flex md:h-12 text-lg items-center md:flex-row flex-col gap-6 text-white">
                            @foreach(\App\Models\MenuFooter::get() as $menu)
                                <li>
                                    <a href="{{localized_route($menu->pages->route_name)}}" class="relative group menu-item">
                                        <span>{{$menu->title}}</span>
                                        <span class="menu-interaction"></span>
                                    </a>
                                </li>
                            @endforeach

                            {{--                            <li>--}}
                            {{--                                <a href="{{localized_route('screening')}}" class="relative group">--}}
                            {{--                                    <span>Health Screening</span>--}}
                            {{--                                    <span class="menu-interaction"></span>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a href="{{localized_route('career')}}" class="relative group">--}}
                            {{--                                    <span>Careers</span>--}}
                            {{--                                    <span class="menu-interaction"></span>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a href="{{localized_route('news')}}" class="relative group">--}}
                            {{--                                    <span>News</span>--}}
                            {{--                                    <span class="menu-interaction"></span>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}
                            {{--                            <li>--}}
                            {{--                                <a href="{{localized_route('offers')}}" class="relative group">--}}
                            {{--                                    <span>Offers</span>--}}
                            {{--                                    <span class="menu-interaction"></span>--}}
                            {{--                                </a>--}}
                            {{--                            </li>--}}

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
                    <a href="{{localized_route('terms')}}">{{__('terms.conditions')}}</a>
                    <a href="{{localized_route('privacy')}}">{{__('privacy.policy')}}</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="fixed bottom-0 right-0 w-24 h-24 overflow-hidden z-10"
    x-data="{ showElement: false }"
    x-init="window.addEventListener('scroll', () => {
        showElement = window.scrollY > 100;
    })"
    x-show="showElement"
    x-transition:enter="transition ease-out duration-500 opacity-0"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-500 opacity-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <div @click="openFeedback = true"
        class="absolute bottom-0 rotate-180 cursor-pointer right-0 w-full  h-full border-b-[96px] border-l-[96px] border-transparent border-l-primary">
    <span class="text-white text-sm top-5 rotate-[135deg] absolute z-99 right-8 font-semibold">
      Feedback
    </span>
    </div>
</div>
<div x-show="openFeedback" x-cloak class="bg-black/50 fixed inset-0 z-[99]" :class="openFeedback ? 'block' : 'hidden'">
    <div class="absolute w-screen sm:w-fit top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 h-[80%]">
        <div class="absolute  cursor-pointer -top-10 right-2 sm:-right-10"  @click="openFeedback = false">
            <x-heroicon-o-x-mark
                class="text-white w-10 h-10"

            />
        </div>
        <div
            class="bg-white mx-4 sm:mx-0 rounded-2xl p-4 sm:p-6  h-full"
        >
            <!-- Scrollable inner content -->
            <div class="h-full overflow-y-auto">
                <img src="{{\Awcodes\Curator\Models\Media::find($setting['site']['logo_primary'])?->url}}" alt="logo" class="mx-auto h-8 mt-4"/>
                <div class="text-center text-2xl mt-4 font-semibold">We'd love your feedback! </div>
                @livewire('frontend.feedback')
            </div>
        </div>
    </div>

</div>
@filamentScripts()
</body>
</html>
