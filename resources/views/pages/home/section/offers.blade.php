<div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0">
    <div class="flex flex-col mb-8">
        <x-typography.subheading location="section">{{$page->content['offer']['title']}}</x-typography.subheading>
        <x-typography.heading>{{$page->content['offer']['heading']}}</x-typography.heading>
    </div>
    <x-slider autoplay="false" id="offersSlider" class="mb-12" arrow="bottom-right" items="4" mobile="1" infinity="true" centered="true">
        @foreach($offers as $o)
            <x-slider.slider-item>
                <x-grid.basic
                    image="{{\Awcodes\Curator\Models\Media::find($o->image)->url}}"
                    heading="{!! $o->title !!}"
                />
            </x-slider.slider-item>
        @endforeach
    </x-slider>
    <x-button.link href="{{route('offers')}}" class="-mt-2.5">{{$page->content['offer']['button_label']}}</x-button.link>

</div>
