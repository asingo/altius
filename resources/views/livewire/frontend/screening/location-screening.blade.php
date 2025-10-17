<div class="location-filter">
    <span class="text-2xl font-semibold">Locations</span>
    <div class="mt-4">
        <div
            x-data="{ location: @entangle('location') }"
            class="space-y-2"
        >
            @foreach($data as $k=>$d)
                <label
                    class="flex items-center justify-between gap-2 cursor-pointer border-b-[1.5px] py-2 border-slate-300 w-full"
                >
                    <span class="text-lg flex-1">{{ ucwords($d) }}</span>
                    <input
                        type="radio"
                        name="location"
                        value="{{ $k }}"
                        x-model="location"
                        @change="$wire.locationChanged()"
                        class="mr-2 cursor-pointer"
                    >
                </label>
            @endforeach
        </div>

    </div>

</div>
