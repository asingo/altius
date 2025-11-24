<div class="date-filter">
    <span class="text-md font-semibold">{{__('preferred.date')}}</span>

    <div class="mt-4">
        {{ $this->form }}

        <div
            x-data="{ date: @entangle('date') }"
            class="space-y-2 mt-4"
        >
            @foreach($data as $k => $d)
                <div
                    class="flex items-center justify-between cursor-pointer border-b-[1.5px] py-2 rounded transition-colors"
                    @click="date = '{{ $k }}'; $nextTick(() => $wire.dateChanged())"
                >
                    <label
                        for="date-{{ $this->getId() }}-{{ $k }}"
                        class="text-md flex-1 cursor-pointer"
                    >
                        {{ $d }}
                    </label>

                    <input
                        type="radio"
                        name="date-{{ $this->getId() }}" {{-- 👈 unique name per component instance --}}
                        id="date-{{ $this->getId() }}-{{ $k }}" {{-- 👈 unique id per component instance --}}
                        value="{{ $k }}"
                        x-model="date"
                        @checked($date === $k)
                        class="mr-2 cursor-pointer"
                    >
                </div>
            @endforeach
        </div>
    </div>
</div>
