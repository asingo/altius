@props(['location' => ''])
<div
    class="flex items-center gap-2 {{$location == 'section' ? 'text-[24px] text-secondary' : 'text-[24px] text-textsub font-semibold'}}">
    @if($location == 'section')
        <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 0.5L10.472 6.02795L16 8.5L10.472 10.972L8 16.5L5.52795 10.972L0 8.5L5.52795 6.02795L8 0.5Z"
                  fill="#5590DD"/>
        </svg>
    @endif
    {{$slot}}
</div>
