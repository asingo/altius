@props(['image' => '','heading' => '','description' => '', 'slug' => '', 'price' => '', 'equal' => false])
<div>
    <a href="{{$slug}}" class="group">
        <div class="rounded-2xl">
            <img src="{{$image}}" class="w-full object-cover rounded-2xl">
        </div>
        <div class="flex flex-col gap-1 mt-1.5">
            <h5 class=" font-medium group-hover:text-primary transition ease-in-out duration-150 {{$equal ? 'h-[63px]' : ''}}">{{$heading}}</h5>
            <p class="{{$equal ? 'h-[81px]' : ''}}">
                {!! limit_words($description, 10) !!}
            </p>
            @if($price != '')
                <span
                    class="text-primary text-xl font-medium mt-2">Rp {{number_format($price, 0, ',','.')}}</span>
            @endif
        </div>
    </a>

</div>
