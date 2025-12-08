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

        @php
            $role = auth()->user()->role;

            // ACL helper (read -> view fallback)
            $allowed = function(string $page) use ($role) : bool {
                $key = ltrim($page, '/');
                return \App\Class\RoleManager::getAcl($key, $role, 'read')
                    || \App\Class\RoleManager::getAcl($key, $role, 'view');
            };

            // Helper closures to check visibility (use closures to avoid redeclare issues)
            $isVisibleItem = function(array $item) use ($allowed) : bool {
                if (isset($item['children'])) {
                    foreach ($item['children'] as $child) {
                        $permKey = $child['perm'] ?? ltrim($child['url'], '/');
                        if ($allowed($permKey)) return true;
                    }
                    return false;
                }
                $permKey = $item['perm'] ?? ltrim($item['url'] ?? '', '/');
                return $allowed($permKey);
            };

            $isVisibleGroup = function(array $group) use ($isVisibleItem) : bool {
                foreach ($group['items'] as $item) {
                    if ($isVisibleItem($item)) return true;
                }
                return false;
            };

            // --- MENU DEFINITION (make sure this is present) -----------------------
            $menu = [
                [
                    'label' => 'Health Care',
                    'items' => [
//                        ['title'=>'Dashboard','url'=>'/'.$adminSlug,'icon'=>'home','perm'=>'dashboard'],
                        ['title'=>'Doctors','url'=>'/'.$adminSlug.'/doctors','icon'=>'doctor','perm'=>'doctors'],
                        ['title'=>'Patients','url'=>'/'.$adminSlug.'/patients','icon'=>'patient','perm'=>'patients'],
                    ],
                ],
                [
                    'label' => 'Content',
                    'items' => [
                        ['title'=>'Pages','url'=>'/'.$adminSlug.'/pages','icon'=>'pages','perm'=>'pages'],
                        [
                            'title'=>'Services','icon'=>'services',
                            'children'=> [
                                ['title'=>'Center of Excellence','url'=>'/'.$adminSlug.'/coes','perm'=>'coes'],
                                ['title'=>'Emergencies','url'=>'/'.$adminSlug.'/emergencies','perm'=>'emergencies'],
                                ['title'=>'Facilities','url'=>'/'.$adminSlug.'/facilities','perm'=>'facilities'],
                                ['title'=>'Services','url'=>'/'.$adminSlug.'/services','perm'=>'services'],
                                ['title'=>'Specialities','url'=>'/'.$adminSlug.'/specialities','perm'=>'specialities'],
                            ],
                        ],
                        [
                            'title'=>'Health Screening','icon'=>'healthscreening',
                            'children' => [
                                ['title'=>'Health Screenings','url'=>'/'.$adminSlug.'/health-screenings','perm'=>'health-screenings'],
                                ['title'=>'Category','url'=>'/'.$adminSlug.'/health-screening/categories','perm'=>'health-screening-categories'],
                                ['title'=>'Age','url'=>'/'.$adminSlug.'/health-screening/category-ages','perm'=>'health-screening-ages'],
                            ],
                        ],
                        [
                            'title'=>'Offers','icon'=>'offers',
                            'children'=> [
                                ['title'=>'List Offers','url'=>'/'.$adminSlug.'/offers','perm'=>'offers'],
                                ['title'=>'Category','url'=>'/'.$adminSlug.'/offer/offers-categories','perm'=>'offer-categories'],
                            ],
                        ],
                        [
                            'title'=>'News','icon'=>'news',
                            'children'=> [
                                ['title'=>'List News','url'=>'/'.$adminSlug.'/news','perm'=>'news'],
                                ['title'=>'Category','url'=>'/'.$adminSlug.'/news-cat/categories','perm'=>'news-categories'],
                            ],
                        ],
                         ['title'=>'Articles','url'=>'/'.$adminSlug.'/articles','icon'=>'heroicon-o-clipboard-document-list','perm'=>'articles'],

                        [
                            'title'=>'Careers','icon'=>'careers',
                            'children'=> [
                                ['title'=>'List Careers','url'=>'/'.$adminSlug.'/careers','perm'=>'careers'],
                                ['title'=>'Categories','url'=>'/'.$adminSlug.'/career/career-categories','perm'=>'career-categories'],
                                ['title'=>'Departments','url'=>'/'.$adminSlug.'/career/departments','perm'=>'career-departments'],
                                ['title'=>'Submissions','url'=>'/'.$adminSlug.'/career-submissions','perm'=>'career-submissions'],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Manage',
                    'items' => [
                        ['title'=>'Media','url'=>'/'.$adminSlug.'/media','icon'=>'media','perm'=>'media'],
                        ['title'=>'Locations','url'=>'/'.$adminSlug.'/locations','icon'=>'location','perm'=>'locations'],
                        ['title'=>'Testimonies','url'=>'/'.$adminSlug.'/testimonies','icon'=>'testimonies','perm'=>'testimonies'],
                        [
                            'title'=>'Slider','icon'=>'slider',
                            'children'=> [
                                ['title'=>'List Sliders','url'=>'/'.$adminSlug.'/sliders','perm'=>'sliders'],
                                ['title'=>'Settings','url'=>'/'.$adminSlug.'/slider-settings','perm'=>'slider-settings'],
                            ],
                        ],
                        [
                            'title'=>'Feedback','icon'=>'feedback',
                            'children'=> [
                                ['title'=>'Form Lists','url'=>'/'.$adminSlug.'/feedback-form','perm'=>'feedback-form'],
                                ['title'=>'Responses','url'=>'/'.$adminSlug.'/feedback-response','perm'=>'feedback-response'],
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Help & Settings',
                    'items' => [
                        [
                            'title'=>'Settings','icon'=>'settings',
                            'children' => [
                                ['title'=>'General','url'=>'/'.$adminSlug.'/general-setting','perm'=>'general-setting'],
                                ['title'=>'Users','url'=>'/'.$adminSlug.'/users','perm'=>'users'],
                                ['title'=>'Logs','url'=>'/'.$adminSlug.'/user-logs','perm'=>'user-logs'],
                                ['title'=>'Menu','url'=>'/'.$adminSlug.'/menu-setting','perm'=>'menu-setting'],
                                ['title'=>'Security','url'=>'/'.$adminSlug.'/security-settings','perm'=>'security-settings'],
                                ['title'=>'SEO','url'=>'/'.$adminSlug.'/seo-setting','perm'=>'seo-setting'],
                            ],
                        ],
                    ],
                ],
            ];
        @endphp

        <ul class="fi-sidebar-nav-groups flex flex-col gap-y-7"
            x-data="{ currentUrl: @js(url()->current()) }">
            <li>
                <a href="/{{$adminSlug}}"
                   class="flex items-center gap-2 px-3 py-2 hover:text-primary-600 hover:!bg-[#EAF1FB] rounded-lg
               {{ env('APP_URL').'/'.$adminSlug == url()->current() ? 'text-primary-600 !bg-[#EAF1FB]' : '' }}"
                >
                    <x-icon name="home" class="w-5 h-5"></x-icon>
                    <span class="!text-sm">Dashboard</span>
                </a>
            </li>

            @foreach($menu as $group)
                @if(! $isVisibleGroup($group))
                    @continue
                @endif

                <li class="mb-4">
                    <label class="text-sm text-gray-500 ml-3">{{ $group['label'] }}</label>

                    <ul class="mt-3 space-y-1">

                        @foreach($group['items'] as $item)
                            @if(! $isVisibleItem($item))
                                @continue
                            @endif

                            @if(isset($item['children']))
                                @php
                                    $activeChild = collect($item['children'])->first(fn($c) => url($c['url']) === url()->current());
                                @endphp

                                <li
                                    x-data="{
                                hover: false,
                                open: {{ $activeChild ? 'true' : 'false' }},
                                hoverTimer: null,
                                leaveTimer: null
                            }"
                                    @mouseenter="
                                clearTimeout(leaveTimer);
                                hoverTimer = setTimeout(() => hover = true, 120);   // <-- Hover delay
                            "
                                    @mouseleave="
                                clearTimeout(hoverTimer);
                                leaveTimer = setTimeout(() => hover = false, 200); // <-- Close delay
                            "
                                    class="relative"
                                >
                                    <!-- Parent -->
                                    <button
                                        @click="open = !open"
                                        class="flex items-center justify-between w-full px-3 py-2 hover:text-primary-600 hover:!bg-[#EAF1FB] rounded-lg transition-all duration-200"
                                    >
                                        <div class="flex items-center gap-2">
                                            <x-icon name="{{ $item['icon'] }}" class="w-5 h-5"></x-icon>
                                            <span class="!text-sm">{{ $item['title'] }}</span>
                                        </div>

                                        <svg
                                            :class="{'rotate-180': open}"
                                            class="w-4 h-4 transition-transform duration-300 ease-in-out"
                                            fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24"
                                        >
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <!-- INLINE SUBMENU -->
                                    <ul
                                        x-show="open"
                                        x-collapse.duration.250ms
                                        class="mx-4 mt-1 py-2 space-y-1 bg-slate-100 rounded-lg shadow-inner transition-all"
                                    >
                                        @foreach($item['children'] as $child)
                                            @php $permKey = $child['perm'] ?? ltrim($child['url'], '/'); @endphp
                                            @if(! $allowed($permKey))
                                                @continue
                                            @endif

                                            <li>
                                                <a href="{{ url($child['url']) }}"
                                                   class="block px-3 py-1 rounded text-sm transition-colors duration-200
                                               {{ url($child['url']) === url()->current()
                                                    ? 'text-primary-600'
                                                    : 'hover:text-primary-600'
                                               }}">
                                                    {{ $child['title'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <!-- FLOATING SUBMENU WITH TRANSITION -->
                                    <div
                                        x-show="hover && !open"
                                        x-transition:enter="transition ease-out duration-200"
                                        x-transition:enter-start="opacity-0 translate-y-1"
                                        x-transition:enter-end="opacity-100 translate-y-0"
                                        x-transition:leave="transition ease-in duration-150"
                                        x-transition:leave-start="opacity-100 translate-y-0"
                                        x-transition:leave-end="opacity-0 translate-y-1"
                                        class="absolute left-full top-0 p-4 bg-white shadow-lg rounded-lg py-2 w-48 z-50 border border-gray-100"
                                    >
                                        <div class="border-l-2 border-gray-200 pl-2">
                                            @foreach($item['children'] as $child)
                                                @php $permKey = $child['perm'] ?? ltrim($child['url'], '/'); @endphp
                                                @if(! $allowed($permKey))
                                                    @continue
                                                @endif

                                                <a href="{{ url($child['url']) }}"
                                                   class="block px-2 py-1 text-sm hover:text-primary-600 transition-colors duration-200">
                                                    {{ $child['title'] }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>

                                </li>

                            @else
                                <!-- Simple link -->
                                <li>
                                    <a href="{{ url($item['url']) }}"
                                       class="flex items-center gap-2 px-3 py-2 hover:text-primary-600 hover:!bg-[#EAF1FB] rounded-lg transition-all
                                   {{ url($item['url']) === url()->current() ? 'text-primary-600 !bg-[#EAF1FB]' : '' }}">
                                        <x-icon name="{{ $item['icon'] }}" class="w-5 h-5"></x-icon>
                                        <span class="!text-sm">{{ $item['title'] }}</span>
                                    </a>
                                </li>
                            @endif

                        @endforeach

                    </ul>
                </li>
            @endforeach
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
