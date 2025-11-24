<div class="location-filter">
    <span class="text-md font-semibold">{{__('Age')}}</span>
    <div class="mt-4">
        <div
            x-data="{ age: @entangle('age') }"
            class="space-y-2"
        >
            @foreach($data as $d)
                <label
                    class="flex items-center justify-between gap-2 cursor-pointer border-b-[1.5px] py-2 border-slate-300 w-full" for="age-{{$this->getId()}}-{{$d['id']}}"
                >
    <span class="text-md flex-wrap">
        {{ ucwords($d['name']) }}{{$d['age'] == '' ? '' : ':'}} <small>{{ $d['age'] }}</small>
    </span>
                    <input
                        type="radio"
                        name="age"
                        id="age-{{$this->getId()}}-{{$d['id']}}"
                        value="{{ $d['id'] }}"
                        x-model="age"
                        @change="$wire.ageChanged()"
                        class="mr-2 cursor-pointer"
                    >
                </label>
            @endforeach
        </div>

    </div>

</div>
