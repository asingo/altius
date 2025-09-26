<div class="location-filter">
    <span class="text-2xl font-semibold">Category</span>
    <div class="mt-4">
        <div
            x-data="{ category: @entangle('category') }"
            class="space-y-2"
        >
            @foreach($data as $d)
                <label
                    class="flex items-center justify-between gap-2 cursor-pointer border-b-[1.5px] py-2 border-slate-300 w-full"
                >
                    <span class="text-lg flex-1">{{ $d }}</span>
                    <input
                        type="radio"
                        name="category"
                        value="{{ $d }}"
                        x-model="category"
                        @change="$wire.categoryChanged()"
                        class="mr-2 cursor-pointer"
                    >
                </label>
            @endforeach
        </div>

    </div>

</div>
