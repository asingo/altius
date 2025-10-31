<div class="max-w-screen-2xl mx-auto">
    <h3 class="text-3xl font-heading">{{__('more.about')}}</h3>
    <x-grid class="mt-10">
        @foreach($page->content['more_about']['grid'] as $grid)
            <x-grid.items-icon
                icon="{{ \Awcodes\Curator\Models\Media::find($grid['icon'])?->url }}"
                title="{{$grid['title']}}"
            >
               {!! $grid['content'] !!}
            </x-grid.items-icon>
        @endforeach
    </x-grid>
</div>
