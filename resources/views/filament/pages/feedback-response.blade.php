<x-filament-panels::page>
    @foreach ($feedback as $k => $f)
        <x-filament::section
            collapsible
        >
            <x-slot name="heading">
                {{$k}}
            </x-slot>
            @if($f['type'] == 'range')
                @livewire('feedback-chart', ['data' => $f['data']->toArray()])
            @endif
            @if($f['type'] == 'text')
                <div class="overflow-x-auto rounded-xl">
                    <table class="w-full bg-white rounded-xl border-collapse min-w-[800px]">
                        <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="text-left px-4 py-3 font-semibold">Answer</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-800">
                        @foreach($f['data'] as $d)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3">{{$d}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @endif
            @if($f['type'] == 'select')
                <div class="overflow-x-auto rounded-xl">
                    <table class="w-full bg-white rounded-xl border-collapse min-w-[800px]">
                        <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="text-left px-4 py-3 font-semibold">Option</th>
                            <th class="text-left px-4 py-3 font-semibold">Total</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-800">
                        @foreach($f['data'] as $k=>$d)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-4 py-3">{{$k}}</td>
                                <td class="px-4 py-3">{{$d}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @endif
            @if($f['type'] == 'file')
                <div class="flex">
                    @foreach($f['data'] as $d)
                        @if($d != null)
                        <img src="{{asset('storage/'.$d)}}" class="w-1/2 object-cover" alt="">
                        @endif
                    @endforeach
                </div>
            @endif
            {{-- Content --}}
        </x-filament::section>
    @endforeach

</x-filament-panels::page>
