<div class="mt-6 space-y-6">

    <div class="grid grid-cols-2 mb-8 gap-4 w-full">
        <div class="bg-white shadow-sm rounded-xl p-4 ">
            <div>
                <x-heroicon-o-chart-pie class="w-8 h-8 bg-slate-50 text-primary-500" />
            </div>
            <div>
                <span>Total Responses</span>
                <h3 class="text-2xl font-semibold">{{count($response['data'])}}</h3>
            </div>

        </div>   <div class="bg-white shadow-sm rounded-xl p-4 ">
            <div>
                <x-heroicon-o-chart-pie class="w-8 h-8 bg-slate-50 text-primary-500" />
            </div>
            <div>
                <span>Total Feedbacks</span>
                <h3  class="text-2xl font-semibold">{{\App\Models\FeedbackResponse::all()->count()}}</h3>
            </div>

        </div>
    </div>
    <div class="bg-white shadow-sm rounded-xl p-4">
        <h2 class="font-semibold mb-4">Response List</h2>
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
                @php $i = 1;@endphp
                @foreach($response['data'] as $d)
                    @if($d != null)
                        <div class="border border-slate-200 p-4 rounded-2xl flex flex-col gap-2 w-full">
                            <span>Response #{{$i}}</span>
                            <div>
                                <img src="{{asset('storage/'.$d)}}" class="w-1/4 object-cover" alt="">

                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>

</div>
