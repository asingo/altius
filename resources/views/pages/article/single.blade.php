@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="{{__('Article')}}" subparentlink="{{localized_route('article')}}" child="{{$title}}"/>
        <div class="mt-10">
            <x-typography.heading tag="h1" location="page">{{$title}}
            </x-typography.heading>
        </div>
        <div class="mt-8">
            <div class="flex justify-between w-fit gap-2 items-center text-xl text-textsub">
                <span>{{\Carbon\Carbon::parse($data['created_at'])->translatedFormat('F d, Y')}}</span>
            </div>
        </div>
        <div class="mt-8">
            <img src="{{asset(\Awcodes\Curator\Models\Media::find($data['image'])?->url)}}" alt="" class="w-full h-auto rounded-xl aspect-[21/9] object-cover">
        </div>
        <div class="mt-8 post-content max-w-screen-lg mx-auto">
            {!! tiptap_converter()->asHTML($data->content) !!}
        </div>
        <x-share-bar title="{{$title}}" slug="{{$data['slug']}}"/>
    </div>
    <div class="py-24 bg-shade">
        <div class="max-w-screen-2xl mx-auto px-6 2xl:px-0">
            <h3 class="text-3xl font-heading font-medium text-center">{{__('Related News')}}</h3>
            <div class="mt-10 flex flex-col gap-6">
                @foreach($others as $n)
                    <x-grid.news-grid title="{{$n->title}}" slug="{{$n->slug}}" category="" type="articles" date="{{$n['created_at']}}"/>
                @endforeach
            </div>
        </div>

    </div>
@endsection
