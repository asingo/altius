@php
    $statePath = $getStatePath();
    $min = $getMin();
    $max = $getMax();
@endphp

<div class="flex flex-col gap-2">
    <div>
        <span class="text-lg">{{$getLabel()}}</span>
    </div>
    <div
        x-data="{
        state: @entangle($statePath),
    }"
        class="flex gap-4 justify-between py-2"
    >

        @for ($i = $min; $i <= $max; $i++)
            <label class="relative cursor-pointer">
                <input
                    type="radio"
                    class="peer sr-only"
                    name="{{ $statePath }}"
                    value="{{ $i }}"
                    x-model="state"
                >
                <div class="w-12 h-12 flex text-lg items-center justify-center rounded-full border-2 border-gray-300 peer-checked:border-primary peer-checked:bg-primary text-gray-600 peer-checked:text-white font-semibold transition">
                    {{ $i }}
                </div>
            </label>
        @endfor
    </div>
</div>
