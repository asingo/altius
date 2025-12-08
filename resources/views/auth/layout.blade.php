<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Altius Hospitals</title>
    @filamentStyles()
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-screen flex flex-col justify-between">
<main class="h-full flex flex-col justify-center items-center">
    <div class="md:max-w-screen-2xl w-full  mx-auto px-6 2xl:px-0">
        <div class="grid md:grid-cols-2 gap-10">
            <div class="hidden md:block">
                    <img src="{{asset('asset/login-bg.jpg')}}" class="rounded-2xl" alt="login image"/>
            </div>
            @php
                $setting = \App\Models\Setting::where('name','general')->first()?->value;
            @endphp
            <div>
                <div class="flex flex-col justify-center items-center h-full">
                    <a href="/{{app()->getLocale() == 'en' ? '' : 'id'}}">
                    <img src="{{\Awcodes\Curator\Models\Media::find($setting['site']['logo_primary'])?->url}}"
                         alt="login image" class="w-[250px]"/>
                    </a>
                    <div class="flex flex-col gap-1 text-center my-6">
                        <h1 class="text-2xl font-medium">{{__('Welcome to Altius Hospitals')}}</h1>
                        <p class="text-md">{{__('Your Health Is Our Priority')}}</p>
                    </div>
                    {{$slot}}
                    <div
                        wire:navigate.loading
                        class="flex items-center justify-center"
                    >
                        <div
                            class="h-12 w-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer>
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
@filamentScripts()
<script>
    window.addEventListener('livewire:navigated', () => {
        console.log('navigated');
        document.querySelectorAll('[wire\\:navigate\\.loading]').forEach(el => {
            el.style.display = 'none';

        });
    });
</script>
</body>
</html>
