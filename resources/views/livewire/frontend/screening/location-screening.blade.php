<div class="location-filter">
    <span class="text-2xl font-semibold">Locations</span>
    <div class="mt-4">
        <div
            x-data="{ location: @entangle('location') }"
            class="space-y-2"
        >
            @foreach($data as $d)
                <div
                    class="flex items-center justify-between gap-2 cursor-pointer border-b-[1.5px] py-2 border-slate-300"
                    @click="location = '{{$d}}'" wire:click="locationChanged"
                >
                    <label for="{{Str::slug($d)}}"  class="text-lg flex-wrap">{{$d}}</label>
                    <input type="radio" name="location" id="{{Str::slug($d)}}" value="{{$d}}" x-model="location" class="mr-2">
                </div>
            @endforeach
        </div>

    </div>

</div>
