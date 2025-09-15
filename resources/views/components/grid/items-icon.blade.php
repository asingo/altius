@props([
    'icon' => '',
    'title' => ''
])
<div class="gap-2 flex flex-col px-6 rounded-2xl py-8 bg-white shadow-grid ">
    <img src="{{$icon}}" alt="icon" class="w-12 h-12">
    <span class="text-xl font-bold">{{$title}}</span>
    <p>{{$slot}}</p>
</div>
