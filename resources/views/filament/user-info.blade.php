@php
    $initial = collect(explode(' ', $user->name))->map(function($item){
       $item = substr($item, 0, 1);
       return $item;
    })->toArray();
@endphp
<div class="bg-slate-100 rounded-xl px-4 py-4 relative" x-data="{userHover: false, hoverTimeout: null}">
    <div class="flex items-center gap-2" :class="$store.sidebar.isOpen ? '' : 'justify-center cursor-pointer'">
        <x-filament::avatar  x-on:mouseenter="clearTimeout(hoverTimeout); userHover = true;"
                             x-on:mouseleave="hoverTimeout = setTimeout(() => {userHover = false},300);"
            src="https://ui-avatars.com/api/?name={{implode('+', $initial)}}&color=FFFFFF&background=225CA8"
        />
        <div class="flex flex-col"  :class="$store.sidebar.isOpen ? '' : 'hidden'">
            <span class="font-medium !text-md"> {{$user->name}}</span>
            <span class="!text-sm !font-thin"> {{$user->email}}</span>
        </div>
    </div>
    <div  :class="$store.sidebar.isOpen ? '' : 'hidden'">
        <form action="{{route('filament.admin.auth.logout')}}" method="post">
            @csrf
            <x-filament::button type="submit" color="primary" outlined class="mt-2 w-full">Log Out</x-filament::button>
        </form>
    </div>
    <div class="absolute bottom-0 rounded-xl p-4 bg-white left-20 shadow-sm w-fit" x-show="!$store.sidebar.isOpen && userHover"
         x-on:mouseenter="clearTimeout(hoverTimeout); userHover = true;"
         x-on:mouseleave="hoverTimeout = setTimeout(() => {userHover = false},300);"
    >

        <div class="flex flex-col">
            <span class="font-medium !text-md"> {{$user->name}}</span>
            <span class="!text-sm !font-thin"> {{$user->email}}</span>
        </div>
        <form action="{{route('filament.admin.auth.logout')}}" method="post">
            @csrf
            <x-filament::button type="submit" color="primary" outlined class="mt-2 w-full">Log Out</x-filament::button>
        </form>
    </div>

</div>
