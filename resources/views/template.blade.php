<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header x-data="{ atTop: false }"
        @scroll.window="atTop = window.scrollY > 50;"
        class="header text-[18px] fixed top-0 left-0 right-0 z-10 pt-4 transition-all duration-500 ease-in-out"
        :class="atTop && 'drop-shadow-lg' "
        :style="atTop ? {background: 'white'} : {background: 'linear-gradient(180deg,rgba(23, 23, 23, 0.8) 0%, rgba(23, 23, 23, 0) 100%)'}"
>
    <div class="flex items-center justify-between max-w-screen-2xl mx-auto border-b border-white pb-4">
        <div class="header-left">
            <img :class="!atTop && 'brightness-0 invert' " src="{{asset('asset/logo.png')}}" alt="">
        </div>
        <nav class="menu">
            <ul class="flex items-center gap-6 text-white" :class="atTop && '!text-[#171717]' ">
                <li>
                    <a href="{{route('home')}}" class="relative group">
                        <span>About Us</span>
                        <span class="menu-interaction"></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="relative group">
                        <span>Location</span>
                        <span class="menu-interaction"></span>
                    </a>
                </li>
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
                        <span>Contact Us</span>
                        <span class="menu-interaction"></span>
                    </a>
                </li>
                <li>
                    <a href="{{route('home')}}" class="relative group">
                        <span class="flex gap-2 items-center">
                            <svg width="20" height="20" viewBox="0 0 20 20" class="fill-white" :class="atTop && '!fill-red-500' "
                                 xmlns="http://www.w3.org/2000/svg">
<path
    d="M11.3642 6.84333L11.2106 5H8.51919L8.36558 6.84333H5.3172L2 10.824V14.8311H3.75412C3.95525 15.5395 4.60749 16.06 5.37944 16.06C6.1514 16.06 6.8036 15.5395 7.00477 14.8311H12.725C12.9261 15.5395 13.5784 16.06 14.3503 16.06C15.1223 16.06 15.7745 15.5395 15.9757 14.8311H17.7298V6.84333H11.3642ZM5.37944 15.1383C4.95594 15.1383 4.61139 14.7938 4.61139 14.3703C4.61139 13.9468 4.95594 13.6022 5.37944 13.6022C5.80295 13.6022 6.1475 13.9468 6.1475 14.3703C6.1475 14.7938 5.80295 15.1383 5.37944 15.1383ZM7.22278 10.53H3.44474L5.74891 7.765H7.22278V10.53ZM9.29045 6.84333L9.36725 5.92167H10.3625L10.4393 6.84333H9.29045ZM13.4287 11.7589H12.507V10.8372H11.5853V9.91556H12.507V8.99389H13.4287V9.91556H14.3503V10.8372H13.4287V11.7589ZM14.3503 15.1383C13.9268 15.1383 13.5823 14.7938 13.5823 14.3703C13.5823 13.9468 13.9268 13.6022 14.3503 13.6022C14.7738 13.6022 15.1184 13.9468 15.1184 14.3703C15.1184 14.7938 14.7738 15.1383 14.3503 15.1383Z"
    />
</svg>

                            Emergency 564 123</span>
                        <span class="menu-interaction"></span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="header-right flex items-center gap-4">
            <div x-data="{ open: false, selected: 'EN' }" class="relative inline-block text-left">
                <!-- Trigger Button -->
                <button
                    @click="open = !open"
                    class="flex items-center gap-1.5 px-4 py-2 text-white" :class="atTop && '!text-[#171717]' "
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
                    class="absolute right-0 mt-2 w-[100px] bg-white border border-gray-200 rounded-lg shadow-lg z-50"
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
            <a href="#" class="btn-outline" :class="atTop && 'btn-outline-alt' ">
                <x-heroicon-o-user-circle class="w-5 h-5"/>
                Login
            </a>
        </div>
    </div>
</header>
@yield('content')
</body>
</html>
