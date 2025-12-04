@php use App\Class\AdminSlug; @endphp
@props([
    'navigation',
])

@php
    $openSidebarClasses = 'fi-sidebar-open w-[--sidebar-width] translate-x-0 shadow-xl ring-1 ring-gray-950/5 dark:ring-white/10 rtl:-translate-x-0';
    $isRtl = __('filament-panels::layout.direction') === 'rtl';

    $adminSlug = AdminSlug::getSlug();

    function getParentUrl($length){
         $request = request()->getPathInfo();
        return implode('/',array_slice(explode('/', $request),0,$length));
    }
   $parent = getParentUrl(3);
    if($parent == '/'. $adminSlug .'/health-screening'){
        $parent = getParentUrl(4);
    }
    if($parent == '/'. $adminSlug .'/offer'){
        $parent = getParentUrl(4);
    }
    if($parent == '/'. $adminSlug .'/news-cat'){
        $parent = getParentUrl(4);
    }
    if($parent == '/'. $adminSlug .'/career'){
        $parent = getParentUrl(4);
    }
@endphp

{{-- format-ignore-start --}}
<aside
    x-data="{}"
    @if (filament()->isSidebarCollapsibleOnDesktop() && (! filament()->hasTopNavigation()))
        x-cloak
    x-bind:class="
            $store.sidebar.isOpen
                ? @js($openSidebarClasses . ' ' . '')
                : '-translate-x-full rtl:translate-x-full lg:translate-x-0 rtl:lg:-translate-x-0'
        "
    @else
        @if (filament()->hasTopNavigation())
            x-cloak
    x-bind:class="$store.sidebar.isOpen ? @js($openSidebarClasses) : '-translate-x-full rtl:translate-x-full'"
    @elseif (filament()->isSidebarFullyCollapsibleOnDesktop())
        x-cloak
    x-bind:class="$store.sidebar.isOpen ? @js($openSidebarClasses . ' ' . '') : '-translate-x-full rtl:translate-x-full'"
    @else
        x-cloak="-lg"
    x-bind:class="
                $store.sidebar.isOpen
                    ? @js($openSidebarClasses . ' ' . '')
                    : 'w-[--sidebar-width] -translate-x-full rtl:translate-x-full'
            "
    @endif
    @endif
    {{
        $attributes->class([
            'fi-sidebar inset-y-0 start-0 z-30 flex flex-col content-start bg-white transition-all dark:bg-gray-900 lg:z-0 lg:bg-transparent lg:shadow-none lg:ring-0 lg:transition-none dark:lg:bg-transparent',
            'lg:translate-x-0 rtl:lg:-translate-x-0' => ! (filament()->isSidebarCollapsibleOnDesktop() || filament()->isSidebarFullyCollapsibleOnDesktop() || filament()->hasTopNavigation()),
            'lg:-translate-x-full rtl:lg:translate-x-full' => filament()->hasTopNavigation(),
        ])
    }}
>
    <div class="overflow-x-clip">
        <header
            class="fi-sidebar-header flex h-16 items-center bg-white px-6 ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 lg:shadow-sm"
        >
            <div
                @if (filament()->isSidebarCollapsibleOnDesktop())
                    x-show="$store.sidebar.isOpen"
                x-transition:enter="lg:transition lg:delay-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                @endif
            >
                @if ($homeUrl = filament()->getHomeUrl())
                    <a {{ \Filament\Support\generate_href_html($homeUrl) }}>
                        <x-filament-panels::logo/>
                    </a>
                @else
                    <x-filament-panels::logo/>
                @endif
            </div>

            @if (filament()->isSidebarCollapsibleOnDesktop())
                <x-filament::icon-button
                    color="gray"
                    :icon="$isRtl ? 'heroicon-o-chevron-left' : 'heroicon-o-chevron-right'"
                    {{-- @deprecated Use `panels::sidebar.expand-button.rtl` instead of `panels::sidebar.expand-button` for RTL. --}}
                    :icon-alias="$isRtl ? ['panels::sidebar.expand-button.rtl', 'panels::sidebar.expand-button'] : 'panels::sidebar.expand-button'"
                    icon-size="lg"
                    :label="__('filament-panels::layout.actions.sidebar.expand.label')"
                    x-cloak
                    x-data="{}"
                    x-on:click="$store.sidebar.open()"
                    x-show="! $store.sidebar.isOpen"
                    class="mx-auto"
                />
            @endif

            @if (filament()->isSidebarCollapsibleOnDesktop() || filament()->isSidebarFullyCollapsibleOnDesktop())
                <x-filament::icon-button
                    color="gray"
                    :icon="$isRtl ? 'heroicon-o-chevron-right' : 'heroicon-o-chevron-left'"
                    {{-- @deprecated Use `panels::sidebar.collapse-button.rtl` instead of `panels::sidebar.collapse-button` for RTL. --}}
                    :icon-alias="$isRtl ? ['panels::sidebar.collapse-button.rtl', 'panels::sidebar.collapse-button'] : 'panels::sidebar.collapse-button'"
                    icon-size="lg"
                    :label="__('filament-panels::layout.actions.sidebar.collapse.label')"
                    x-cloak
                    x-data="{}"
                    x-on:click="$store.sidebar.close()"
                    x-show="$store.sidebar.isOpen"
                    class="ms-auto hidden lg:flex"
                />
            @endif
        </header>
    </div>

    <nav
        class="fi-sidebar-nav flex-grow flex flex-col gap-y-7 bg-white px-6 py-8"
        style="scrollbar-gutter: stable"
    >
        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SIDEBAR_NAV_START) }}

        @if (filament()->hasTenancy() && filament()->hasTenantMenu())
            <div
                @class([
                    'fi-sidebar-nav-tenant-menu-ctn',
                    '-mx-2' => ! filament()->isSidebarCollapsibleOnDesktop(),
                ])
                @if (filament()->isSidebarCollapsibleOnDesktop())
                    x-bind:class="$store.sidebar.isOpen ? '-mx-2' : '-mx-4'"
                @endif
            >
                <x-filament-panels::tenant-menu/>
            </div>
        @endif

        <ul class="fi-sidebar-nav-groups flex flex-col gap-y-7 "
            x-data="{routeName: @js(request()->route()->getName())}">
            <li>
                <label class="text-sm text-gray-500 ml-3" x-show="$store.sidebar.isOpen">Health Care</label>
                <ul class="mt-3">
                    <li class="group  hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2 {{$parent == '/'.$adminSlug.'' ? 'active-menu' : ''}}">
                        <a href="/{{$adminSlug}}" class="flex text-sm items-center gap-3">
                            <x-icon-home class="group-hover:text-primary-600"/>
                            <span x-show="$store.sidebar.isOpen">Dashboard</span>
                        </a>
                    </li>
                    <li class="group  hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2 {{$parent == '/'.$adminSlug.'/doctors' ? 'active-menu' : ''}}">
                        <a href="/{{$adminSlug}}/doctors"
                           class="flex text-sm items-center gap-3">
                            <x-icon-doctor class="group-hover:text-primary-600"/>
                            <span x-show="$store.sidebar.isOpen">Doctors</span>
                        </a>
                    </li>
                    <li class="group  hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2 {{$parent == '/'.$adminSlug.'/patients' ? 'active-menu' : ''}}">
                        <a href="/{{$adminSlug}}/patients"
                           class="flex text-sm items-center gap-3">
                            <x-icon-patient class="group-hover:text-primary-600"/>
                            <span x-show="$store.sidebar.isOpen">Patients</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <label class="text-sm text-gray-500 ml-3" x-show="$store.sidebar.isOpen">Content</label>
                <ul class="mt-3">
                    <li class="group  hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2 {{$parent == '/'.$adminSlug.'/pages' ? 'active-menu' : ''}}">
                        <a href="/{{$adminSlug}}/pages"
                           class="flex text-sm items-center gap-3">
                            <x-icon-pages class="group-hover:text-primary-600"/>
                            <span x-show="$store.sidebar.isOpen">Pages</span>
                        </a>
                    </li>
                    @php
                        $serviceChild = [
                            'Center of Excellence' => '/'.$adminSlug.'/coes',
                            'Emergencies' => '/'.$adminSlug.'/emergencies',
                            'Facilities' => '/'.$adminSlug.'/facilities',
                            'Services' => '/'.$adminSlug.'/services',
                            'Specialities' => '/'.$adminSlug.'/specialities'
                        ];
                        $services = in_array($parent, array_values($serviceChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($services), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-services class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">Services</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>

                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($serviceChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($serviceChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </li>
                    @php
                        $healthScreenChild = [
                            'Health Screenings' => '/'.$adminSlug.'/health-screenings',
                            'Category' => '/'.$adminSlug.'/health-screening/categories',
                            'Age' => '/'.$adminSlug.'/health-screening/category-ages',
                        ];
                        $healthScreen = in_array($parent, array_values($healthScreenChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($healthScreen), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-healthscreening class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">Health Screening</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>

                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($healthScreenChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($healthScreenChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </li>
                    @php
                        $offersChild = [
                            'List Offers' => '/'.$adminSlug.'/offers',
                            'Category' => '/'.$adminSlug.'/offer/offers-categories',

                        ];
                        $offers = in_array($parent, array_values($offersChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($offers), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-offers class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">Offers</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>
                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($offersChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($offersChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @php
                        $newsChild = [
                            'List News' => '/'.$adminSlug.'/news',
                            'Category' => '/'.$adminSlug.'/news-cat/categories',

                        ];
                        $news = in_array($parent, array_values($newsChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($news), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-news class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">News</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>
                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($newsChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($newsChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @php
                        $careerChild = [
                            'List Careers' => '/'.$adminSlug.'/careers',
                            'Categories' => '/'.$adminSlug.'/career/career-categories',
                            'Departments' => '/'.$adminSlug.'/career/departments',
                            'Submissions' => '/'.$adminSlug.'/career-submissions',

                        ];
                        $career = in_array($parent, array_values($careerChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($career), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-careers class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">Careers</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>
                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($careerChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($careerChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <label class="text-sm text-gray-500 ml-3" x-show="$store.sidebar.isOpen">Manage</label>
                <ul class="mt-3">
                    <li class="group  hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2 {{$parent == '/'.$adminSlug.'/media' ? 'active-menu' : ''}}">
                        <a href="/{{$adminSlug}}/media"
                           class="flex text-sm items-center gap-3">
                            <x-icon-media class="group-hover:text-primary-600"/>
                            <span x-show="$store.sidebar.isOpen">Media</span>
                        </a>
                    </li>
                    <li class="group  hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2 {{$parent == '/'.$adminSlug. '/locations' ? 'active-menu' : ''}}">
                        <a href="/{{$adminSlug}}/locations"
                           class="flex text-sm items-center gap-3">
                            <x-icon-location class="group-hover:text-primary-600"/>
                            <span x-show="$store.sidebar.isOpen">Locations</span>
                        </a>
                    </li>
                    <li class="group  hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2 {{$parent == '/'.$adminSlug . '/testimonies' ? 'active-menu' : ''}}">
                        <a href="/{{$adminSlug}}/testimonies"
                           class="flex text-sm items-center gap-3">
                            <x-icon-testimonies class="group-hover:text-primary-600"/>
                            <span x-show="$store.sidebar.isOpen">Testimonies</span>
                        </a>
                    </li>
                    @php
                        $sliderChild = [
                            'List Sliders' => '/' .$adminSlug. '/sliders',
                            'Settings' => '/'.$adminSlug . '/slider-settings',
                        ];
                        $slider = in_array($parent, array_values($sliderChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($slider), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-slider class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">Services</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>

                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($sliderChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($sliderChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </li>
                    @php
                        $feedbackChild = [
                            'Form Lists' => '/'.$adminSlug . '/feedback-form',
                            'Responses' => '/'.$adminSlug . '/feedback-response',
                        ];
                        $slider = in_array($parent, array_values($feedbackChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($slider), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-feedback class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">Feedback</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>

                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($feedbackChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($feedbackChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </li>
                </ul>
            </li>
            <li>
                <label class="text-sm text-gray-500 ml-3" x-show="$store.sidebar.isOpen">Help & Settings</label>
                <ul class="mt-3">
                    @php
                        $settingChild = [
                             'General' => '/'.$adminSlug . '/general-setting',
                             'Users' => '/'.$adminSlug . '/users',
                             'Logs' => '/'.$adminSlug . '/user-logs',
                             'Menu' => '/'.$adminSlug . '/menu-setting',
                             'Security' => '/'.$adminSlug . '/security-settings',
                            'SEO' => '/'.$adminSlug . '/seo-setting',


                        ];
                        $setting = in_array($parent, array_values($settingChild));

                    @endphp
                    <li class="relative" x-data="{items: @js($setting), menu: false}">
                        <a href="#"
                           x-on:mouseover="!items ? menu = true : null"
                           x-on:mouseout="!items ? menu = false : null"

                           class="flex group justify-between text-sm items-center gap-3 hover:!bg-[#EAF1FB] hover:text-primary-600 rounded-lg px-3 py-2">
                            <div class="flex items-center gap-3">
                                <x-icon-settings class="group-hover:text-primary-600"/>
                                <span x-show="$store.sidebar.isOpen">Settings</span>
                            </div>
                            <div>
                                <x-heroicon-o-chevron-up x-show="$store.sidebar.isOpen"
                                                         class="group-hover:text-primary-600 group-hover:rotate-90 transition-all duration-300 ease-in-out w-4 h-4"
                                                         x-bind:class="items ? 'rotate-180' : ''"/>
                            </div>
                        </a>

                        <div class="bg-gray-100 mx-2 py-4 rounded-lg" x-show="$store.sidebar.isOpen && items">
                            <ul class="border-l-2  border-gray-400 pl-3 ml-6 flex flex-col gap-y-3">
                                @foreach($settingChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="bg-white mx-2 p-6 absolute -top-1/2 -right-[220px] w-[200px] shadow-lg rounded-2xl" x-show="$store.sidebar.isOpen && menu"
                             x-on:mouseover="menu = true"
                             x-on:mouseout="menu = false"
                             x-transition:enter="transition ease-out duration-200 delay-100"
                             x-transition:enter-start="opacity-0 "
                             x-transition:enter-end="opacity-100 "
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                        >
                            <ul class="border-l-2  border-gray-400 pl-3 flex flex-col gap-y-3">
                                @foreach($settingChild as $k => $v)
                                    <li class="submenu-item relative group {{$parent == $v ? 'active-menu' : ''}}">
                                        <a href="{{$v}}"
                                           class="flex text-sm items-center gap-3 group-hover:text-primary-600">
                                            <span x-show="$store.sidebar.isOpen">{{$k}}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </li>
                </ul>
            </li>
        </ul>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('sidebarAccordion', {
                    openLabel: localStorage.getItem('openGroup') ?? null,
                    hoveredLabel: null,
                    hoverTimeout: null,

                    toggle(label) {
                        this.openLabel = this.openLabel === label ? null : label
                        localStorage.setItem('openGroup', this.openLabel ?? '')
                    },

                    onHover(label) {
                        // Cancel any pending collapse
                        clearTimeout(this.hoverTimeout)
                        this.hoveredLabel = label
                    },

                    onLeave(label) {
                        // Add small delay before collapsing if not pinned open
                        clearTimeout(this.hoverTimeout)
                        this.hoverTimeout = setTimeout(() => {
                            if (this.openLabel !== label) {
                                this.hoveredLabel = null
                            }
                        }, 200) // <-- delay in ms
                    },

                    isOpen(label) {
                        // Show if hovered or clicked open
                        return this.openLabel === label || this.hoveredLabel === label
                    },
                })
            })
            {{--var collapsedGroups = JSON.parse(--}}
            {{--    localStorage.getItem('collapsedGroups'),--}}
            {{--)--}}

            {{--if (collapsedGroups === null || collapsedGroups === 'null') {--}}
            {{--    localStorage.setItem(--}}
            {{--        'collapsedGroups',--}}
            {{--        JSON.stringify(@js(--}}
            {{--            collect($navigation)--}}
            {{--                ->filter(fn (\Filament\Navigation\NavigationGroup $group): bool => $group->isCollapsed())--}}
            {{--                ->map(fn (\Filament\Navigation\NavigationGroup $group): string => $group->getLabel())--}}
            {{--                ->values()--}}
            {{--                ->all()--}}
            {{--        )),--}}
            {{--    )--}}
            {{--}--}}

            {{--collapsedGroups = JSON.parse(--}}
            {{--    localStorage.getItem('collapsedGroups'),--}}
            {{--)--}}

            {{--document--}}
            {{--    .querySelectorAll('.fi-sidebar-group')--}}
            {{--    .forEach((group) => {--}}
            {{--        if (--}}
            {{--            !collapsedGroups.includes(group.dataset.groupLabel)--}}
            {{--        ) {--}}
            {{--            return--}}
            {{--        }--}}

            {{--        // Alpine.js loads too slow, so attempt to hide a--}}
            {{--        // collapsed sidebar group earlier.--}}
            {{--        group.querySelector(--}}
            {{--            '.fi-sidebar-group-items',--}}
            {{--        ).style.display = 'none'--}}
            {{--        group--}}
            {{--            .querySelector('.fi-sidebar-group-collapse-button')--}}
            {{--            .classList.add('-rotate-180')--}}
            {{--    })--}}
        </script>

        {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SIDEBAR_NAV_END) }}
    </nav>

    {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::SIDEBAR_FOOTER) }}
</aside>
{{-- format-ignore-end --}}
