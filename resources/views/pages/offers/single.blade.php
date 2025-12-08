@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto pt-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="{{__('Offers')}}" subparentlink="{{localized_route('offers')}}" child="{{$title}}"/>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10">
            <div class="md:col-span-1">
                {{--                <div class="mt-8">--}}
                <img src="{{asset(\Awcodes\Curator\Models\Media::find($data['image'])?->url)}}" alt=""
                     class="w-full h-auto rounded-xl">
                {{--                </div>--}}
            </div>
            <div class="md:col-span-2">
                <div>
                    <x-typography.heading tag="h1" location="page">{{$title}}
                    </x-typography.heading>
                </div>

                <div class="bg-[#EAF1FB] rounded-xl p-4 text-gray-600 text-lg my-6">
                    <div class="flex flex-col">
                        <span class="font-semibold">{{__('Location')}}</span>
                        <div class="flex gap-4">
                            @foreach($data->hasLocation as $d)
                                <span class="bg-slate-50 py-1 px-2 rounded-xl">{{$d->location->title}}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-row gap-12 mt-4">
                        <div class="flex flex-col">
                            <span class="font-semibold">{{__('Category')}}</span>
                            <div class="flex gap-4">
                                <span class="bg-slate-50 py-1 px-2 rounded-xl">
                                   {{$data->category->title}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <h2 class="font-heading mt-8">{{__('Description')}}</h2>--}}
                <div class="mt-8 post-content">
                    {!! tiptap_converter()->asHTML($data->content) !!}
                </div>
                <div>
                    <x-button.link href="{{get_wa_link($title)}}" class="w-full text-center mt-4">{{__('Claim This Package')}}</x-button.link>
                </div>
            </div>
        </div>
   ,<x-share-bar title="{{$title}}"/>
    </div>
    <div class="pb-12 pt-6">
        <div class="max-w-screen-2xl mx-auto px-6 2xl:px-0">
            <h3 class="text-3xl font-heading font-medium">{{__('Related Offers')}}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12 items-stretch my-8">
                @foreach($others as $d)
                    <x-grid.basic
                        image="{{\Awcodes\Curator\Models\Media::find($d['image'])?->url}}"
                        heading="{!! $d['title'] !!}"
                        slug="{{localized_route('offers')}}/{{$d['slug']}}"
                    />
                @endforeach
            </div>
        </div>

    </div>
@endsection
