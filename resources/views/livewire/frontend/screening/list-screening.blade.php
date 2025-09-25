<div class="grid grid-cols-3 gap-x-6 gap-y-12 items-stretch">
    @foreach($data as $d)
        <div class="flex flex-col h-full">
            <div class="rounded-2xl">
                <img src="{{$d['image']}}" alt="image" class="w-full object-cover rounded-2xl"/>
            </div>
            <div class="mt-4 flex flex-col h-full justify-stretch">
                <h3 class="text-2xl font-medium flex-grow">{{$d['title']}}</h3>
                <p class="my-2">{{$d['description']}}</p>
                <span class="text-primary text-xl font-medium">Rp {{number_format($d['price'], 0, ',','.')}}</span>
            </div>
        </div>
    @endforeach
</div>
