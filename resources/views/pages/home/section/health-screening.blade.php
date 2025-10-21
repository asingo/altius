<div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0">
    <div class="flex flex-col mb-8">
        <x-typography.subheading location="section">Your Health, Your Priority</x-typography.subheading>
        <x-typography.heading>Discover Our Health Screening Package</x-typography.heading>
    </div>
    <x-slider autoplay="false" id="screeningSlider" class="mb-12" arrow="bottom-right" items="4" mobile="1"
              infinity="true" centered="true">
        @foreach($healthScreening as $h)
            <x-slider.slider-item>
                <x-grid.basic
                    image="{{\Awcodes\Curator\Models\Media::find($h->image)->url}}"
                    heading="{{$h->title}}"
                    description="{{$h->description}}"
                />
            </x-slider.slider-item>
        @endforeach
    </x-slider>
    <x-button.link href="{{route('screening')}}" class="-mt-2.5">More Health Screening Package</x-button.link>

</div>
