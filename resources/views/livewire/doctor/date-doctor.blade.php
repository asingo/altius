<div class="date-filter">
    <span class="text-2xl font-semibold">Preffered Date</span>
    <div class="mt-4">
        {{$this->form}}
        <div
            x-data="{ date: @entangle('date') }"
            class="space-y-2 mt-4"
        >
            @foreach($data as $k=>$d)
                <div
                    class="flex items-center justify-between cursor-pointer border-b-[1.5px] py-2 rounded"
                    @click="date = '{{$k}}'" wire:click="dateChanged"
                >
                    <label for="date-{{$this->getId()}}-{{$k}}" class="text-lg">{{$d}}</label>
                    <input type="radio" name="date" id="date-{{$this->getId()}}-{{$k}}" value="{{$k}}" x-model="date" class="mr-2">
                </div>
            @endforeach
        </div>

    </div>

</div>
