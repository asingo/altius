<div class="speciality-filter">
    <span class="text-md font-semibold">{{__('speciality')}}</span>

    <div class="mt-4">
        {{ $this->form }}

        <div
            x-data="{ speciality: @entangle('speciality') }"
            class="space-y-2 mt-4"
        >
            @foreach($data as $k => $d)
                <div
                    class="flex items-center justify-between cursor-pointer border-b-[1.5px] py-2 rounded transition-colors"
                    @click="speciality = '{{ $k }}'; $nextTick(() => $wire.specialityChanged())"
                >
                    <label
                        for="speciality-{{ $this->getId() }}-{{ $k }}"
                        class="text-md flex-1 cursor-pointer"
                    >
                        {{ $d }}
                    </label>

                    <input
                        type="radio"
                        name="speciality-{{ $this->getId() }}" {{-- 👈 unique per instance --}}
                        id="speciality-{{ $this->getId() }}-{{ $k }}" {{-- 👈 unique id per instance --}}
                        value="{{ $k }}"
                        x-model="speciality"
                        @checked($speciality === $k)
                        class="mr-2 cursor-pointer"
                    >
                </div>
            @endforeach
        </div>
    </div>
</div>
