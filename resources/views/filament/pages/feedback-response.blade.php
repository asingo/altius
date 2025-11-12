<x-filament-panels::page class="feedback-page">
    <div class="grid grid-cols-3 gap-4 border-t" x-data="{title: @js(array_keys($feedback->toArray())[0])}" style="height: calc(100vh - 80px)">
        <div class="bg-white h-full p-8 col-span-1 border-r border-b">
            <h2 class="text-md font-semibold">Question List</h2>
            <div class="mt-5 flex flex-col gap-3">
                @foreach($feedback as $k => $f)
                    <div class="border border-slate-200 p-4 rounded-2xl flex flex-col gap-2 cursor-pointer hover:bg-primary-500 hover:text-white"
                        @click="title = '{{$k}}'" wire:click="showResponse('{{$k}}')"
                         :class="{'bg-primary-500 text-white': title == @js($k)}"
                    >
                        <h3>{{$k}}</h3>
                        <p class="text-slate-400">
                            @switch($f['type'])
                                @case('range')
                                    Range Question
                                    @break
                                @case('text')
                                    Text Question
                                    @break
                                @case('select')
                                    Select Question
                                    @break
                                @case('file')
                                    File Question
                                    @break
                            @endswitch
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-span-2">
          @livewire('feedback-response', ['feedback' => $feedback, 'first' => array_keys($feedback->toArray())[0] ])
        </div>
    </div>

</x-filament-panels::page>
{{--    @foreach ($feedback as $k => $f)--}}

{{--        <x-filament::section--}}
{{--            collapsible--}}
{{--        >--}}
{{--            <x-slot name="heading">--}}
{{--                {{$k}}--}}
{{--            </x-slot>--}}
{{--            @if($f['type'] == 'range')--}}
{{--                @livewire('feedback-chart', ['data' => $f['data']->toArray()])--}}
{{--            @endif--}}
{{--            @if($f['type'] == 'text')--}}
{{--                <div class="overflow-x-auto rounded-xl">--}}
{{--                    <table class="w-full bg-white rounded-xl border-collapse min-w-[800px]">--}}
{{--                        <thead>--}}
{{--                        <tr class="bg-gray-100 text-gray-700">--}}
{{--                            <th class="text-left px-4 py-3 font-semibold">Answer</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody class="text-gray-800">--}}
{{--                        @foreach($f['data'] as $d)--}}
{{--                            <tr class="border-b hover:bg-gray-50">--}}
{{--                                <td class="px-4 py-3">{{$d}}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}

{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if($f['type'] == 'select')--}}
{{--                <div class="overflow-x-auto rounded-xl">--}}
{{--                    <table class="w-full bg-white rounded-xl border-collapse min-w-[800px]">--}}
{{--                        <thead>--}}
{{--                        <tr class="bg-gray-100 text-gray-700">--}}
{{--                            <th class="text-left px-4 py-3 font-semibold">Option</th>--}}
{{--                            <th class="text-left px-4 py-3 font-semibold">Total</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody class="text-gray-800">--}}
{{--                        @foreach($f['data'] as $k=>$d)--}}
{{--                            <tr class="border-b hover:bg-gray-50">--}}
{{--                                <td class="px-4 py-3">{{$k}}</td>--}}
{{--                                <td class="px-4 py-3">{{$d}}</td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}

{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if($f['type'] == 'file')--}}
{{--                <div class="flex">--}}
{{--                    @foreach($f['data'] as $d)--}}
{{--                        @if($d != null)--}}
{{--                        <img src="{{asset('storage/'.$d)}}" class="w-1/2 object-cover" alt="">--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            --}}{{-- Content --}}
{{--        </x-filament::section>--}}
{{--    @endforeach--}}

{{--</x-filament-panels::page>--}}
