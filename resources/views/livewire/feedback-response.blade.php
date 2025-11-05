<div>
    @if($response['type'] == 'range')
        @livewire('feedback-chart', ['data' => $response['data']->toArray()])
    @endif
    @if($response['type'] == 'text')
        <div class="overflow-x-auto rounded-xl">
            <table class="w-full bg-white rounded-xl border-collapse min-w-[800px]">
                <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="text-left px-4 py-3 font-semibold">Answer</th>
                </tr>
                </thead>
                <tbody class="text-gray-800">
                @foreach($response['data'] as $d)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{$d}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @endif
    @if($response['type'] == 'select')
        <div class="overflow-x-auto rounded-xl">
            <table class="w-full bg-white rounded-xl border-collapse min-w-[800px]">
                <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="text-left px-4 py-3 font-semibold">Option</th>
                    <th class="text-left px-4 py-3 font-semibold">Total</th>
                </tr>
                </thead>
                <tbody class="text-gray-800">
                @foreach($response['data'] as $k=>$d)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{$k}}</td>
                        <td class="px-4 py-3">{{$d}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @endif
    @if($response['type'] == 'file')
        <div class="flex">
            @foreach($response['data'] as $d)
                @if($d != null)
                    <img src="{{asset('storage/'.$d)}}" class="w-1/2 object-cover" alt="">
                @endif
            @endforeach
        </div>
    @endif
</div>
