<div class="grid grid-cols-1 gap-6 mt-6 md:mt-10">
    @if(count($doctors) < 1)
        <div>
            <h2 class="text-2xl">{{__('Data not Found')}}</h2>
        </div>
    @endif
    @foreach($doctors as $d)
        <div class="shadow-grid p-5 flex flex-row gap-5 rounded">
            <div class="flex md:w-1/6 w-1/2 ">
                <img
                    src="{{asset( \Awcodes\Curator\Models\Media::find($d->image)?->url??'asset/doctor/image-doctor.jpg')}}"
                    class="w-full object-cover"
                    alt="doctor">
            </div>
            <div class="flex flex-col gap-2 w-full md:w-5/6">
                <a class="text-primary text-xl font-semibold underline hover:text-accent"
                   href="{{localized_route('doctor')}}/{{$d['slug']}}"><h6>{{$d['name']}}</h6></a>
                <span class=" text-md">{{$d->speciality->title}}</span>
                <div class="flex divide-textsub md:flex-row flex-col">
                    @php $i = 1 @endphp
                    @foreach($d->hasLocation as $l)
                        @php $i++ @endphp
                        <span
                            class="text-md text-textsub {{count($d->hasLocation) < $i ? '' : 'md:border-r md:pr-2 md:mr-2 md:border-textsub'}}">
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
            wire:click="setPage({{ $page - 1 }})" @click="scrollToTop()"
            class="w-5 h-5"
            @if($page <= 1) disabled @endif
        >
            <x-heroicon-o-chevron-left class="{{$page<= 1 ? 'stroke-slate-300': 'stroke-primary'}}"/>
        </button>

        {{-- Numbered Pages --}}
        @for ($i = 1; $i <= $totalPages; $i++)
            <button
                wire:click="setPage({{ $i }})" @click="scrollToTop()"
                class="w-8 h-8 flex items-center justify-center rounded-full font-semibold {{ $page === $i ? 'bg-accent text-white' : '' }}"
            >
                <span class="!text-2xl/0">{{ $i }}</span>
            </button>
        @endfor

        {{-- Next Button --}}
        <button
            wire:click="setPage({{ $page + 1 }})"
            class="w-5 h-5"  @click="scrollToTop()"
            @if($page >= $totalPages) disabled @endif
        >
            <x-heroicon-o-chevron-right class="{{$page >= $totalPages ? 'stroke-slate-300': 'stroke-primary'}}"/>
        </button>
    </div>
        <script>
            function scrollToTop() {
                window.scrollTo({top: 400, behavior: 'smooth'});
            }
        </script>
</div>
