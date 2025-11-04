@php
    $initial = collect(explode(' ', $user->name))->map(function($item){
       $item = substr($item, 0, 1);
       return $item;
    })->toArray();
@endphp
<div class="bg-white border-t-2  px-4 py-4">
    <div class="flex items-center gap-2">
        <x-filament::avatar
            src="https://ui-avatars.com/api/?name={{implode('+', $initial)}}&color=FFFFFF&background=225CA8"
        />
        <div class="flex flex-col">
            <span class="font-medium !text-md"> {{$user->name}}</span>
            <span class="!text-sm !font-thin"> {{$user->email}}</span>
        </div>
    </div>
    <div>
        <form action="{{route('filament.admin.auth.logout')}}" method="post">
            @csrf
            <x-filament::button type="submit" color="primary" outlined class="mt-2 w-full">Log Out</x-filament::button>
        </form>
    </div>

</div>
