@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
{{--        <div class="mt-8">--}}
{{--            <x-typography.subheading location="page">{{$page->content['section']['title']}}</x-typography.subheading>--}}
{{--            <x-typography.heading location="page">{{$page->title}}--}}
{{--            </x-typography.heading>--}}
{{--        </div>--}}
        <div class="max-w-screen-lg mx-auto">
            <div class="mt-8 mb-8">
                {{--            <x-typography.subheading location="page">{{$page->content['section']['title']}}</x-typography.subheading>--}}
                <x-typography.heading location="page">{{$page->title}}
                </x-typography.heading>
            </div>
            {!! tiptap_converter()->asHTML($page->content['content']) !!}
            <div class="mt-8 flex gap-2 flex-col">
                @foreach($page->content['faq'] as $k=>$v)
                    <div x-data="{ show: true }">
                        <div
                            class="flex justify-between cursor-pointer"
                            x-on:click="show = !show"
                        >
                            <span class="text-[24px] font-heading">{{ $v['title'] }}</span>
                            <div class="transform transition-transform duration-300"
                                 :class="show ? 'rotate-180' : '-rotate-0' ">
                                <x-heroicon-o-chevron-down
                                    class="w-7 "
                                />
                            </div>

                        </div>

                        <div
                            x-show="show"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-2"
                            class="grid divide-y divide-dashed border-y border-dashed py-4 mt-4"
                        >
                            <div>
                                {!! tiptap_converter()->asHTML($v['content']) !!}
                            </div>
{{--                            @foreach($v as $c)--}}
{{--                                <div class="px-4 py-2">--}}
{{--                                    <span class="text-xl text-primary">{{ $c }}</span>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
