<div class="flex flex-col gap-8">
    <div class="flex flex-col gap-4">
        <span class="text-2xl font-semibold">{{__('location')}}</span>
        <div class="flex gap-6" x-data="{location: @entangle('location')}">

            @foreach($data as $d)

                <div class="flex items-center gap-1" @click="location = '{{$d['location_id']}}'"
                     wire:click="locationChanged('{{$d['location_id']}}')">
                    <input
                        type="radio"
                        name="location"
                        id="{{ Str::slug($d->location->title) }}"
                        value="{{ $d['location_id'] }}"
                        x-model="location"
                        wire:model="location"
                        class="mr-2"
                        @checked($location === $d['location_id'])
                    >
                    <label
                        for="{{ Str::slug($d->location->title) }}"
                        class="text-lg text-primary font-medium"
                    >
                        {{ $d->location->title }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="flex flex-col gap-4">
        <span class="text-2xl font-semibold">{{__('Regular Schedule')}}</span>
        <div class="md:w-2/3">
            <div class="grid grid-cols-[150px_auto] px-3 rounded-xl py-2 bg-shade text-lg text-primary font-semibold">
                <span>{{__('Day')}}</span>
                <span>{{__('Time')}}</span>
            </div>

            <!-- Rows -->
            @foreach($schedule as $k => $v)
                <div class="grid grid-cols-[150px_auto] px-3 text-lg py-2">
                    <span>{{ __($k)}}</span>
                    <span>{{ $v }}</span>
                </div>
            @endforeach
        </div>
    </div>


</div>
