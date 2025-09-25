<div>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-12 items-stretch">
        @foreach($screening as $d)
            <div class="flex flex-col h-full">
                <div class="rounded-2xl">
                    <img src="{{$d['image']}}" alt="image" class="w-full object-cover rounded-2xl"/>
                </div>
                <div class="mt-4 flex flex-col h-full justify-stretch">
                    <h3 class="text-2xl font-medium flex-grow">{{$d['title']}}</h3>
                    <p class="my-4 mb-6">{{$d['description']}}</p>
                    <span class="text-primary text-xl font-medium">Rp {{number_format($d['price'], 0, ',','.')}}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8 flex items-center gap-2">
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

