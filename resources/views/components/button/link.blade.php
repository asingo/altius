@props([
    'href' => '#',
    'class' => '',
    'newTab' => '_self',
    'outlined' => false,
])
<div class="{{$class}} flex">
    <a href="{{$href}}" target="{{$newTab}}" class=" transition-all duration-300 ease-in-out py-3 px-6 {{$class}} {{$outlined ? 'bg-none text-white border border-white hover:bg-white hover:text-primary':'bg-primary hover:bg-btn-secondary text-white '}} font-semibold rounded-xl transition-all duration-300 ease-in-out ">{{$slot}}</a>
</div>
