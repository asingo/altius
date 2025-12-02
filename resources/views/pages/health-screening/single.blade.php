@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto pt-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="{{__('Health Screening')}}"
                      subparentlink="{{localized_route('screening')}}" child="{{$title}}"/>
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

                <div class="bg-[#EAF1FB] rounded-xl p-4 text-gray-600 text-lg my-6 flex flex-col gap-4">
                    <div class="flex flex-col">
                        <span class="font-semibold">{{__('Location')}}</span>
                        <div class="flex gap-4">
                            @foreach($data->hasLocation as $d)
                                <span class="bg-slate-50 py-1 px-2 rounded-xl">{{$d->location->title}}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="flex flex-col">
                            <span class="font-semibold">{{__('gender')}}</span>
                            <div class="flex gap-4">
                                <span class="bg-slate-50 py-1 px-2 rounded-xl">
                                    @php
                                        echo match($data->gender){
                                               'all' => __('all'),
                                                                    'male' => __('Male'),
                                                                    'female' => __('Female')};
                                    @endphp
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="flex flex-col">
                        <span class="font-semibold">{{__('Age')}}</span>
                        <div class="flex gap-4 sm:gap-y-0 flex-wrap">
                            @foreach($data->hasAge as $d)
                                <span class="bg-slate-50 py-1 px-2 rounded-xl">{{$d->age->title}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-3xl text-primary font-semibold">
                    Rp {{number_format($data->price, 0, ',', '.')}}
                </div>
{{--                <h2 class="font-heading text-2xl mt-8">{{__('Description')}}</h2>--}}
                <div class="mt-8 post-content">
                    {!! tiptap_converter()->asHTML($data->description) !!}
                </div>
                <div>
                    <x-button.link href="{{get_wa_link($title)}}" class="w-full text-center mt-4">{{__('Claim This Package')}}</x-button.link>
                </div>
            </div>
        </div>
        <x-share-bar title="{{$title}}" slug="{{$data->slug}}"/>
    </div>
    <div class="pb-12 pt-6">
        <div class="max-w-screen-2xl mx-auto px-6 2xl:px-0">
            <h3 class="text-3xl font-heading font-medium">{{__('Related Health Screening')}}</h3>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12 items-stretch my-8">
                @foreach($others as $d)
                    <a href="{{localized_route('screening')}}/{{$d->slug}}" class="group">
                        <div class="flex flex-col h-full">
                            <div class="rounded-2xl">
                                <img src="{{\Awcodes\Curator\Models\Media::find($d['image'])->url}}" alt="image"
                                     class="w-full object-cover rounded-2xl"/>
                            </div>
                            <div class="mt-4 flex flex-col h-full justify-stretch">
                                <h3 class="text-2xl font-medium flex-grow group-hover:text-primary transition ease-in-out duration-150">{{$d['title']}}</h3>
                                <p class="my-4 mb-6">{{limit_words($d['description'], 10)}}</p>
                                <span
                                    class="text-primary text-xl font-medium">Rp {{number_format($d['price'], 0, ',','.')}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

    </div>
@endsection
