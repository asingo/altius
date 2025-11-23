@props(['image' => '','heading' => '','description' => '', 'slug' => '', 'price' => ''])
<div>
    <a href="{{$slug}}" class="group">
        <div class="rounded-2xl">
            <img src="{{$image}}" class="w-full object-cover rounded-2xl">
        </div>
        <div class="flex flex-col gap-1 mt-1.5">
            <h4 class="text-[24px] font-medium group-hover:text-primary transition ease-in-out duration-150">{{$heading}}</h4>
            <p>
                {{limit_words($description, 10)}}
            </p>
            @if($price != '')
                <span
                    class="text-primary text-xl font-medium mt-2">Rp {{number_format($price, 0, ',','.')}}</span>
            @endif
        </div>
    </a>

</div>
