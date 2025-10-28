<div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div>
            <img src="{{ \Awcodes\Curator\Models\Media::find($page->content['about']['image'])?->url }}" alt="icon" class="w-full">
        </div>
        <div>
            <x-typography.subheading location="section">{{$page->content['about']['title']}}</x-typography.subheading>
            <h2 class="text-primary text-3xl font-medium my-2">{{$page->content['about']['heading']}}</h2>
          {!! tiptap_converter()->asHTML($page->content['about']['content'])!!}
            <x-button.link href="{{localized_route('about')}}" class="mt-6">{{$page->content['about']['button_label']}}</x-button.link>
        </div>
    </div>

</div>
