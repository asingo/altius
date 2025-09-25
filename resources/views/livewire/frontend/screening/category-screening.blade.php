<div class="flex bg-shade w-fit p-4 rounded-xl gap-2">
    @foreach($data as $d)
        <div
            class="flex items-center text-xl group hover:text-white hover:bg-primary cursor-pointer rounded-xl py-2 px-4 gap-2 {{ $selected['name'] == $d['name'] ? 'text-white bg-primary':  ''}}">
            <img src="{{$d['icon']}}" alt="icon" class="group-hover:brightness-0 group-hover:invert    {{ $selected['name'] == $d['name'] ? 'brightness-0 invert':  ''}}"/>
            <span>{{$d['name']}}</span>
        </div>
    @endforeach

</div>
