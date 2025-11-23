<div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0"
     x-data="{ open: false, videoSrc: '' }"
     x-on:open-video.window="
        videoSrc = $event.detail.src;
        open = true;
    "
     x-init="$watch('open', value => { if (!value) $refs.video.src = '' })"
>
    <div class="flex flex-col items-center mb-8">
        <x-typography.subheading location="section">{{$page->content['testimony']['title']}}</x-typography.subheading>
        <x-typography.heading class="text-center">{{$page->content['testimony']['heading']}}</x-typography.heading>
    </div>
    <x-slider id="testimonySlider">
        @foreach($testimonies as $t)
        <x-slider.slider-item>
            <x-slider.slider-testimony
                thumbnail="{{\Awcodes\Curator\Models\Media::find($t->image)->url}}"
                profile="{{\Awcodes\Curator\Models\Media::find($t->image)->url}}"
                video="{{\Awcodes\Curator\Models\Media::find($t->video)?->url}}"
                name="{{$t->name}}"
                date="{{\Carbon\Carbon::parse($t->date)->translatedFormat('d F Y')}}"
                title="{{$t->title}}"
            >
               {!! tiptap_converter()->asHTML($t->content) !!}
            </x-slider.slider-testimony>
        </x-slider.slider-item>
        @endforeach
    </x-slider>
    <template x-if="open">
        <div
            x-show="open"
            x-transition.opacity
            class="fixed inset-0 bg-black/70 flex items-center justify-center z-50"
            @click.self="open = false"
        >
            <div
                x-show="open"
                x-transition
                class="bg-white rounded-2xl overflow-visible shadow-xl w-full  max-w-screen-xl  relative"
            >
                <button
                    @click="open = false"
                    class="absolute -top-10 -right-10 text-gray-700 hover:text-gray-900 z-[50]"
                >
                    <x-heroicon-o-x-mark class="w-8 h-8 stroke-white"/>
                </button>

                <video
                    x-ref="video"
                    x-bind:src="videoSrc"
                    controls
                    autoplay
                    class="w-full aspect-video"
                ></video>
            </div>
        </div>
    </template>

</div>
