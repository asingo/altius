@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="{{__('News')}}" subparentlink="{{localized_route('news')}}" child="{{$title}}"/>
        <div class="mt-10">
            <x-typography.heading location="page">{{$title}}
            </x-typography.heading>
        </div>
        <div class="mt-8">
            <div class="flex justify-between w-fit gap-2 items-center text-xl text-textsub">
                <span>{{$data->category->title}}</span>
                <span>|</span>
                <span>{{\Carbon\Carbon::parse($data['created_at'])->translatedFormat('F d, Y')}}</span>
            </div>
        </div>
        <div class="mt-8">
            <img src="{{asset(\Awcodes\Curator\Models\Media::find($data['image'])?->url)}}" alt="" class="w-full h-auto rounded-xl aspect-[21/9] object-cover">
        </div>
        <div class="mt-8 post-content max-w-screen-lg mx-auto">
            {!! tiptap_converter()->asHTML($data->content) !!}
        </div>
        <div class="bg-slate-50 my-24 py-2 text-lg rounded-xl flex justify-center items-center">
            <span class="me-3">{{__('Share to')}}</span>
            <a href="whatsapp://send?text={{\Illuminate\Support\Str::sanitizeHtml($title . ' ')}}{{request()->url()}}"
               class="mx-2">
                <x-icon-whatsapp/>
            </a> <a href="https://facebook.com/share.php?u={{request()->url()}}" class="mx-2">
                <x-icon-facebook/>
            </a>
            <button
                class="mx-2 relative"
                x-data="{showTooltip: false}"
                @click="navigator.clipboard.writeText(`{{request()->url()}}`); showTooltip = true"
                @mouseleave="showTooltip = false"
            >
                <x-heroicon-o-document-duplicate class="w-10 h-10 bg-primary text-white rounded-full p-2"/>
                <span class="absolute -top-8 right-0 -mt-2 -mr-2 px-2 py-1 text-white bg-gray-800 rounded-md" x-show="showTooltip">Copied</span>
            </button>
        </div>
    </div>
    <div class="py-24 bg-shade">
        <div class="max-w-screen-2xl mx-auto px-6 2xl:px-0">
            <h3 class="text-3xl font-heading font-medium text-center">{{__('Latest Blog & News')}}</h3>
            <div class="mt-10 flex flex-col gap-6">
                @foreach($others as $n)
                    <x-grid.news-grid title="{{$n['title']}}" slug="{{$n['slug']}}" category="{{$n->category->title}}" date="{{$n['created_at']}}"/>
                @endforeach
            </div>
        </div>

    </div>
@endsection
