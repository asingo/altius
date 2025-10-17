<div class="flex bg-shade lg:w-fit p-4 rounded-xl gap-2 overflow-x-auto">
    @foreach($data as $d)
        <div
            wire:click="changeFilter('{{$d['id']}}')"
            class="flex items-center flex-shrink-0 text-xl group hover:text-white hover:bg-primary cursor-pointer rounded-xl py-2 px-4 gap-2 {{ $selected == $d['id'] ? 'text-white bg-primary':  ''}}">
            <img src="{{$d['icon']}}" alt="icon" class="group-hover:brightness-0 group-hover:invert    {{ $selected == $d['id'] ? 'brightness-0 invert':  ''}}"/>
            <span class="text-nowrap">{{ucwords($d['title'])}}</span>
        </div>
    @endforeach

</div>
