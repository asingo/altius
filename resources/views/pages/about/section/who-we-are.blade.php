<div class="max-w-screen-xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center pt-12 md:pt-24">
        <div>
            <img src="{{ \Awcodes\Curator\Models\Media::find($page->content['about_us']['image'])?->url }}" alt="who we are" class="w-full h-auto rounded-2xl">
        </div>
        <div>
            <x-typography.subheading location="page">{{$page->content['about_us']['title']}}</x-typography.subheading>
            <h3 class="font-heading text-3xl mt-3">{{$page->content['about_us']['heading']}}</h3>
            <div class="flex flex-col gap-4 mt-3">
              {!!$page->content['about_us']['content'] !!}
            </div>
        </div>


    </div>
    <div class="flex flex-col-reverse md:grid md:grid-cols-2 gap-10 items-center py-24" >
        <div>
            <x-typography.subheading location="page">{{$page->content['about_us_2']['title']}}</x-typography.subheading>
            <h3 class="font-heading text-3xl mt-3">{{$page->content['about_us_2']['heading']}}</h3>
            <div class="flex flex-col gap-4 mt-3">
              {!! $page->content['about_us_2']['content'] !!}
            </div>
        </div>
        <div>
            <img src="{{ \Awcodes\Curator\Models\Media::find($page->content['about_us_2']['image'])?->url }}" alt="who we are" class="w-full h-auto rounded-2xl">
        </div>



    </div>
</div>
