<div class="flex bg-shade lg:w-fit p-3 sm:p-4 rounded-xl sm:gap-2 overflow-x-auto">
    @foreach($data as $d)
        <div
            wire:click="changeFilter('{{$d['id']}}')"
            class="flex items-center flex-shrink-0 text-lg group hover:text-white hover:bg-primary cursor-pointer rounded-xl py-2 px-4 gap-2 {{ $selected == $d['id'] ? 'text-white bg-primary':  ''}}">
            <img src="{{$d['icon']}}" alt="icon" class="group-hover:brightness-0 group-hover:invert w-6 h-6 sm:w-8 sm:h-8 {{ $selected == $d['id'] ? 'brightness-0 invert':  ''}}"/>
            <span class="text-nowrap !text-md">{{ucwords($d['title'])}}</span>
        </div>
    @endforeach

</div>
