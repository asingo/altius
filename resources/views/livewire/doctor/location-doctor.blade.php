<div class="location-filter"><span class="text-2xl font-semibold">Locations</span>
    <div class="mt-4">
        <div x-data="{ location: @entangle('location') }" class="space-y-2">
            @foreach($data as $k => $d)
                <div class="flex items-center justify-between cursor-pointer border-b-[1.5px] py-2 rounded"
                     @click="location = '{{$k}}'" wire:click="locationChanged">
                    <label for="location-{{$this->getId()}}-{{$k}}"
                           class="text-lg">{{ucwords($d)}}</label>
                    <input type="radio" name="location" id="location-{{$this->getId()}}-{{$k}}" value="{{$k}}" x-model="location"
                           class="mr-2">
                </div>
            @endforeach
        </div>
    </div>
</div>
