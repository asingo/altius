@props(['thumbnail', 'profile', 'name', 'date', 'title'])
    <div class="flex gap-4 flex-col lg:flex-row justify-stretch slider-testimony-item">
        <div class="lg:w-5/12">
            <div class="relative w-full h-full">
                <img src="{{$thumbnail}}" class="rounded-xl w-full h-full object-cover">
                <div class="bg-white rounded-full p-2 w-12 h-12 absolute top-0 bottom-0 left-0 right-0 m-auto">
                    <x-heroicon-o-play class="text-primary"/>
                </div>
            </div>
        </div>
        <div class="lg:w-7/12 border border-slate-300 rounded-xl p-6">
            <div class="flex gap-4 items-center">
                <div>
                    <img src="{{$profile}}" class="w-16 h-16 rounded-full object-cover">
                </div>
                <div class="flex flex-col">
                    <span class="text-2xl font-medium">{{$name}}</span>
                    <span class=" text-slate-400">{{$date}}</span>
                </div>
            </div>
            <h3 class="my-4 text-3xl sm:text-4xl medium text-secondary">
                {{$title}}
            </h3>
            {{$slot}}
        </div>
    </div>


