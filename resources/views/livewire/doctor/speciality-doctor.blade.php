<div class="speciality-filter">
    <span class="text-2xl font-semibold">Speciality</span>
    <div class="mt-4">
        {{$this->form}}
        <div
            x-data="{ speciality: @entangle('speciality') }"
            class="space-y-2 mt-4"
        >
            @foreach($data as $d)
                <div
                    class="flex items-center justify-between cursor-pointer border-b-[1.5px] py-2 rounded"
                    @click="speciality = '{{$d}}'" wire:click="specialityChanged"
                >
                    <label for="{{Str::slug($d)}}"  class="text-lg">{{$d}}</label>
                    <input type="radio" name="speciality" id="{{Str::slug($d)}}" value="{{$d}}" x-model="speciality" class="mr-2">
                </div>
            @endforeach
        </div>

    </div>

</div>
