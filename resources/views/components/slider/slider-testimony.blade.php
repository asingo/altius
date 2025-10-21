@props(['thumbnail' => '', 'profile' => '', 'name' => '', 'date' => '', 'title' => '', 'video' => ''])

<div class="flex gap-4 flex-col lg:flex-row justify-stretch slider-testimony-item">
    <div class="lg:w-5/12">
        {{-- Thumbnail --}}
        <div
            class="relative w-full h-full cursor-pointer group"
            @click="$dispatch('open-video', { src: '{{ $video }}' })"
        >
            <img
                src="{{ $thumbnail }}"
                class="rounded-xl w-full h-full object-cover"
                alt="testimony"
            >
            <div
                class="bg-white rounded-full p-2 w-12 h-12 absolute top-0 bottom-0 left-0 right-0 m-auto flex items-center justify-center transition transform group-hover:scale-110"
            >
                <x-heroicon-o-play class="text-primary w-6 h-6"/>
            </div>
        </div>
        {{-- End thumbnail --}}
    </div>

    <div class="lg:w-7/12 border border-slate-300 rounded-xl p-6">
        <div class="flex gap-4 items-center">
            <div>
                <img src="{{ $profile }}" class="w-16 h-16 rounded-full object-cover" alt="testimony">
            </div>
            <div class="flex flex-col">
                <span class="text-2xl font-medium">{{ $name }}</span>
                <span class="text-slate-400">{{ $date }}</span>
            </div>
        </div>

        <h3 class="my-4 text-3xl sm:text-4xl font-medium text-secondary">
            {{ $title }}
        </h3>

        {{ $slot }}
    </div>
</div>
