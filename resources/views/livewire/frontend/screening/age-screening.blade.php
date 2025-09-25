<div class="location-filter">
    <span class="text-2xl font-semibold">Age</span>
    <div class="mt-4">
        <div
            x-data="{ age: @entangle('age') }"
            class="space-y-2"
        >
            @foreach($data as $d)
                <div
                    class="flex items-center justify-between gap-2 cursor-pointer border-b-[1.5px] py-2 border-slate-300"
                    @click="age = '{{$d['name']}}'" wire:click="ageChanged"
                >
                    <label for="{{Str::slug($d['name'])}}"  class="text-lg flex-wrap">{{$d['name']}}: <small>{{$d['meta']}}</small></label>
                    <input type="radio" name="age" id="{{Str::slug($d['name'])}}" value="{{$d['name']}}" x-model="age" class="mr-2">
                </div>
            @endforeach
        </div>

    </div>

</div>
