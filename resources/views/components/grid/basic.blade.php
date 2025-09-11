@props(['image','heading','description'])
<div>
    <div class="rounded-2xl">
        <img src="{{$image}}" class="w-full object-cover rounded-2xl">
    </div>
    <div class="flex flex-col gap-1 mt-1.5">
        <h4 class="text-[24px] font-medium">{{$heading}}</h4>
        <p>
           {{$description}}
        </p>
    </div>
</div>
