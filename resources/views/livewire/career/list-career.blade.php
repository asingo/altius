<div class="grid divide-y border-primary rounded-xl border mt-10">
    @foreach($career as $c)
    <div class="flex justify-between items-center p-4">
        <div class="flex flex-col gap-2.5 w-full">
            <a class="text-primary font-semibold text-xl hover:text-accent" href="career/{{$c['slug']}}">{{$c['title']}}</a>
            <div class="grid md:grid-cols-4 w-full">
                <div class="text-textsub text-lg flex gap-1.5 items-center">
                    <x-heroicon-o-map-pin class="w-5 h-5"/>
                    <span>{{$c['location']}}</span>
                </div>
                <div class="text-textsub text-lg flex gap-1.5 items-center">
                    <x-heroicon-o-clock class="w-5 h-5"/>
                    <span>{{Carbon\Carbon::parse($c['created_at'])->format('d F Y')}}</span>
                </div>
            </div>
        </div>
        <div>
            <a class="text-primary font-semibold text-xl hover:text-accent" href="career/{{$c['slug']}}">
                <x-heroicon-o-chevron-right class="w-7 h-7 stroke-textsub hover:stroke-primary"/>
            </a>
        </div>
    </div>


    @endforeach

</div>
