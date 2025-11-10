@props(['media', 'class'])
<img
        class="{{$class}}"
        src="{{ $media['url'] }}"
        alt="{{ $media['alt'] }}"
        width="{{ $media['width'] }}"
        height="{{ $media['height'] }}"
    />
{{--<x-curator-curation :media="$media" curation="thumbnail" loading="lazy"/>--}}
