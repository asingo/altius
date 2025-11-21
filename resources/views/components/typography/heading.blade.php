@props(['class' => '', 'location' => '', 'tag' => 'h2'])
<{{$tag}} class="{{$location == 'section' ? 'text-primary text-3xl' : 'text-texthead text-2xl/[30px] sm:text-3xl/[40px] md:text-4xl/[50px] lg:text-5xl/[60px] font-heading'}}  font-medium my-2 {{$class}}">{{$slot}}</{{$tag}}>
