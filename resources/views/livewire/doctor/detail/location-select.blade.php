<div class="flex flex-col gap-8">
    <div class="flex flex-col gap-4">
        <span class="text-2xl font-semibold">Locations</span>
        <div class="flex gap-6" x-data="{location: @entangle('location')}">
            @foreach($data as $d)
                <div class="flex items-center gap-1" @click="location = '{{$d['name']}}'" wire:click="locationChanged('{{$d['name']}}')">
                    <input
                        type="radio"
                        name="location"
                        id="{{ Str::slug($d['name']) }}"
                        value="{{ $d['name'] }}"
                        x-model="location"
                        wire:model="location"
                        class="mr-2"
                        @checked($location === $d['name'])
                    >
                    <label
                        for="{{ Str::slug($d['name']) }}"
                        class="text-lg text-primary font-medium"
                    >
                        {{ $d['name'] }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex flex-col gap-4">
        <span class="text-2xl font-semibold">Regular Schedule</span>
        <div class="md:w-1/2">
            <div class="grid grid-cols-2 px-3 rounded-xl py-2 bg-shade text-lg text-primary">
                    <span>Day</span>
                    <span>Time</span>
            </div>

            @foreach($schedule as $k => $v)
            <div class="grid grid-cols-2 px-3 text-lg py-2">
                    <span>{{ucwords($k)}}</span>
                    <span>{{$v}}</span>
            </div>
            @endforeach
        </div>
    </div>


</div>
