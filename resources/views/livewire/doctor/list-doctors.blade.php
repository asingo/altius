<div class="grid grid-cols-1 gap-6 mt-6 md:mt-10">

    @foreach($doctors as $d)
        <div class="shadow-grid p-5 flex md:flex-row flex-col gap-5 rounded">
            <div class="flex md:w-1/6 w-1/2 ">
                <img
                    src="{{asset( \Awcodes\Curator\Models\Media::find($d->image)?->url??'asset/doctor/image-doctor.jpg')}}"
                    class="w-full object-cover"
                    alt="doctor">
            </div>
            <div class="flex flex-col gap-2 md:gap-6 w-full md:w-5/6">
                <a class="text-primary text-xl font-semibold underline hover:text-accent"
                   href="medical-professional/{{$d['slug']}}">{{$d['name']}}</a>
                <span class="font-semibold text-xl">{{$d->speciality->title}}</span>
                <div class="flex md:divide-x-[1.5px] divide-textsub md:flex-row flex-col">
                    @foreach($d->hasLocation as $l)

                        <span
                            class="{{count($d->hasLocation) > 1 ? 'md:first:pr-4 md:last:pl-4': ''}}  font-semibold text-lg md:text-xl text-textsub">
                           {{$l->location->title}}
                         </span>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
    <div class="mt-6 flex items-center gap-2">
        {{-- Previous Button --}}
        <button
            wire:click="setPage({{ $page - 1 }})"
            class="w-5 h-5"
            @if($page <= 1) disabled @endif
        >
            <x-heroicon-o-chevron-left class="{{$page<= 1 ? 'stroke-slate-300': 'stroke-primary'}}"/>
        </button>

        {{-- Numbered Pages --}}
        @for ($i = 1; $i <= $totalPages; $i++)
            <button
                wire:click="setPage({{ $i }})"
                class="w-8 h-8 flex items-center justify-center rounded-full font-semibold {{ $page === $i ? 'bg-accent text-white' : '' }}"
            >
                <span class="!text-2xl/0">{{ $i }}</span>
            </button>
        @endfor

        {{-- Next Button --}}
        <button
            wire:click="setPage({{ $page + 1 }})"
            class="w-5 h-5"
            @if($page >= $totalPages) disabled @endif
        >
            <x-heroicon-o-chevron-right class="{{$page >= $totalPages ? 'stroke-slate-300': 'stroke-primary'}}"/>
        </button>
    </div>
</div>
