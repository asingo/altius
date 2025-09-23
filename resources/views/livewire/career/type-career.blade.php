<div class="location-filter">
    <span class="text-2xl">Type</span>
    <div class="mt-4 py-2">
        <div
            x-data="{ type: @entangle('type') }"
            class="flex gap-4"
        >
            @foreach($data as $d)
                <div
                    class="flex items-center gap-1.5 cursor-pointer"
                    @click="type = '{{$d}}'" wire:click="typeChanged"
                >
                    <input type="radio" name="type" id="{{Str::slug($d)}}" value="{{$d}}" x-model="type">
                    <label for="{{Str::slug($d)}}"  class="text-lg">{{$d}}</label>
                </div>
            @endforeach
        </div>

    </div>

</div>
