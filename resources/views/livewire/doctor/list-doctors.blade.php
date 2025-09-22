<div class="grid grid-cols-1 gap-6 mt-10">

    @foreach($doctors as $d)
        <div class="shadow-grid p-5 flex gap-5 rounded">
            <div>
                <img src="{{asset($d['profile'] ?? 'asset/doctor/image-doctor.jpg')}}" class="w-[150px] object-cover"
                     alt="doctor">
            </div>
            <div class="flex flex-col gap-6">
                <a class="text-primary text-xl font-semibold underline hover:text-accent"
                   href="medical-professional/{{$d['slug']}}">{{$d['name']}}</a>
                <span class="font-semibold text-xl">{{$d['speciality']}}</span>
                <div class="flex divide-x-[1.5px] divide-textsub">
                    @foreach($d['location'] as $l)

                        <span class="{{count($d['location']) > 1 ? 'first:pr-4 last:pl-4': ''}}  font-semibold text-xl text-textsub">
                           {{$l['name']}}
                         </span>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
        <div class="mt-4 flex items-center gap-2">
            {{-- Previous Button --}}
            <button
                wire:click="setPage({{ $page - 1 }})"
                class="px-3 py-1 border rounded"
                @if($page <= 1) disabled @endif
            >
                Prev
            </button>

            {{-- Numbered Pages --}}
            @for ($i = 1; $i <= $totalPages; $i++)
                <button
                    wire:click="setPage({{ $i }})"
                    class="px-3 py-1 border rounded {{ $page === $i ? 'bg-blue-500 text-white' : '' }}"
                >
                    {{ $i }}
                </button>
            @endfor

            {{-- Next Button --}}
            <button
                wire:click="setPage({{ $page + 1 }})"
                class="px-3 py-1 border rounded"
                @if($page >= $totalPages) disabled @endif
            >
                Next
            </button>
        </div>
</div>
