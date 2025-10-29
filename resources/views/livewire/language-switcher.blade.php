<div x-data="{ open: false, selected: '{{ strtoupper($locale) }}' }" class="relative inline-block text-left">
    <!-- Trigger Button -->
    <button
        @click="open = !open"
        class="flex items-center gap-1.5 sm:px-4 py-2 text-white text-sm sm:text-[16px]"
        :class="atTop && '!text-[#171717]' "
    >
        <span x-text="selected"></span>
        <svg :class="{ 'rotate-180': open }" class="w-5 h-5 stroke-1.5 transform transition-transform"
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
        <ul class="py-2 menu-list">
            @php
                // Safely generate route or fallback

                if(is_array($param)){
                     $paramId = $param['en'] ?? [];
                     if(isset($param['id'])){
                        $paramId = $param['id'];
                    }
                      $enRoute = $route ? route($route . '_en', $param['en'] ?? []) : '/';
                $idRoute = $route ? route($route . '_id', $paramId ?? []) : '/';
                }else{
                     $enRoute = $route ? route($route . '_en', $param) : '/';
                $idRoute = $route ? route($route . '_id', $param) : '/';
                }



            @endphp

            <li>
                <a href="{{ $enRoute }}"
                   @click="selected = 'EN'; open = false"
                   wire:click.prevent="switchLocale('en', '{{ $enRoute }}')"
                   class="block px-4 py-2 hover:bg-gray-100 hover:!text-primary">
                    EN
                </a>
            </li>

            <li>
                <a href="{{ $idRoute }}"
                   @click="selected = 'ID'; open = false"
                   wire:click.prevent="switchLocale('id', '{{ $idRoute }}')"
                   class="block px-4 py-2 hover:bg-gray-100 hover:!text-primary">
                    ID
                </a>
            </li>
        </ul>
    </div>
</div>
