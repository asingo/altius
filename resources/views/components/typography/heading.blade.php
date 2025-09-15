@props(['class' => '', 'location' => ''])
<h2 class="{{$location == 'section' ? 'text-primary text-3xl' : 'text-texthead text-3xl/[40px] md:text-4xl/[50px] lg:text-5xl/[60px] font-heading'}}  font-medium my-2 {{$class}}">{{$slot}}</h2>
