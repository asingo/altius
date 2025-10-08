@props(['media', 'class'])
<img
        class="{{$class}}"
        src="{{ $media['url'] }}"
        alt="{{ $media['alt'] }}"
        width="{{ $media['width'] }}"
        height="{{ $media['height'] }}"
    />
