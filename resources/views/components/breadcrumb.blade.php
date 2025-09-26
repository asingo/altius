@props([
    'parent',
    'child',
    'subparent',
    'subparent_link'
])
<div class="flex items-center flex-wrap">
   <div class="flex items-center text-lg !text-slate-400 font-medium">
       <a href="/">{{$parent}}</a>
       <x-heroicon-o-chevron-right class="w-5 h-5 stroke-[2px] mx-2"/>
   </div>
    @if($subparent != '')
        <div class="flex items-center text-lg !text-slate-400 font-medium">
            <a href="{{$subparentlink}}">{{$subparent}}</a>
            <x-heroicon-o-chevron-right class="w-5 h-5 stroke-[2px] mx-2"/>
        </div>
    @endif

    <div class="flex items-center text-lg !text-primary font-bold">
      {{$child}}
   </div>
</div>
