<div class="location-filter">
    <span class="text-md font-semibold">{{__('location')}}</span>

    <div class="mt-4">
        <div x-data="{ location: @entangle('location') }" class="space-y-2">
            @foreach($data as $k => $d)
                <div
                    class="flex items-center justify-between cursor-pointer border-b-[1.5px] py-2 rounded transition-colors"
                    @click="location = '{{ $k }}'; $nextTick(() => $wire.locationChanged())"
                >
                    <label
                        for="location-{{ $this->getId() }}-{{ $k }}"
                        class="text-md flex-1 cursor-pointer"
                    >
                        {{ ucwords($d) }}
                    </label>

                    <input
                        type="radio"
                        name="location-{{ $this->getId() }}" {{-- 👈 unique per component instance --}}
                        id="location-{{ $this->getId() }}-{{ $k }}" {{-- 👈 unique id --}}
                        value="{{ $k }}"
                        x-model="location"
                        @checked($location === $k) {{-- 👈 ensure pre-selected radio --}}
                        class="mr-2 cursor-pointer"
                    >
                </div>
            @endforeach
        </div>
    </div>
</div>
