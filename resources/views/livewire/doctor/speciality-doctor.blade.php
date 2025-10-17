<div class="speciality-filter">
    <span class="text-2xl font-semibold">Speciality</span>
    <div class="mt-4">
        {{$this->form}}
        <div
            x-data="{ speciality: @entangle('speciality') }"
            class="space-y-2 mt-4"
        >
            @foreach($data as $k => $d)
                <div
                    class="flex items-center justify-between cursor-pointer border-b-[1.5px] py-2 rounded"
                    @click="speciality = '{{$k}}'" wire:click="specialityChanged"
                >
                    <label for="speciality-{{$this->getId()}}-{{$k}}"  class="text-lg">{{$d}}</label>
                    <input type="radio" name="speciality" id="speciality-{{$this->getId()}}-{{$k}}" value="{{$k}}" x-model="speciality" class="mr-2">
                </div>
            @endforeach
        </div>

    </div>

</div>
