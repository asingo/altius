<div class="location-filter">
    <span class="text-2xl font-semibold">Gender</span>
    <div class="mt-4">
        <div
            x-data="{ gender: @entangle('gender') }"
            class="space-y-2"
        >
            @foreach($data as $d)
                <div
                    class="flex items-center justify-between gap-2 cursor-pointer border-b-[1.5px] py-2 border-slate-300"
                    @click="gender = '{{$d}}'" wire:click="genderChanged"
                >
                    <label for="{{Str::slug($d)}}"  class="text-lg flex-wrap">{{ucwords($d)}}</label>
                    <input type="radio" name="gender" id="{{Str::slug($d)}}" value="{{$d}}" x-model="gender" class="mr-2">
                </div>
            @endforeach
        </div>

    </div>

</div>
