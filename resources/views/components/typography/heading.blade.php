@props(['class' => '', 'location' => '', 'tag' => 'h2'])
<{{$tag}} class="{{$location == 'section' ? 'text-primary' : 'text-texthead font-heading'}}  font-medium my-2 {{$class}}">{{$slot}}</{{$tag}}>
