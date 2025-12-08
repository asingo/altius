@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
        <div class="mt-8">
            <x-typography.subheading location="page">{{$page->content['section']['title']}}</x-typography.subheading>
            <x-typography.heading tag="h1" location="page" class="mt-4">{{$page->content['section']['heading']}}
            </x-typography.heading>
        </div>
        <div class="mt-16 hidden md:block">
            <span class="text-xl font-medium">Filter</span>
        </div>
        <div class="grid md:grid-cols-5 md:mt-8 gap-6 md:gap-12">
            <div class="md:col-span-1" x-data="{ open: false }">
{{--                <div--}}
{{--                    class="flex justify-between cursor-pointer items-center md:hidden"--}}
{{--                    @click="open = !open"--}}
{{--                >--}}
{{--                    <span class="text-2xl font-semibold">Filter</span>--}}
{{--                    <x-heroicon-o-adjustments-horizontal--}}
{{--                        class="w-8 h-8 cursor-pointer"--}}
{{--                    />--}}
{{--                </div>--}}
                <div
                    class="transition-all duration-300 ease-in-out flex items-center w-fit gap-2 lg:hidden mt-4 border border-primary text-primary hover:bg-primary hover:text-white py-2 px-4 rounded-2xl cursor-pointer"
                    @click="open = !open"
                >
                    <span class="text-lg">Filter</span>
                    <x-heroicon-o-adjustments-horizontal
                        class="w-6 h-6 cursor-pointer"
                    />
                </div>
                <div class="fixed z-[99] inset-0 flex items-center justify-center" x-show="open" x-cloak>
                    <div class="fixed inset-0 bg-gray-900 opacity-75"></div>
                    <div class="bg-white rounded-lg p-6 relative w-screen mx-6">
                        <div class="absolute -top-10 right-0 text-gray-400 hover:text-red-500 cursor-pointer"
                             @click="open = false">
                            <x-heroicon-o-x-mark class="w-8 h-8 text-white"/>
                        </div>
                        <div class="space-y-6">
                            <div class="text-xl font-semibold">
                                Filter
                            </div>
                            @livewire('frontend.offer.filter-mobile')
                            <button class="bg-primary text-white px-4 py-2 rounded-lg w-full hover:bg-btn-secondary transition-all duration-300"
                                    x-on:click="open = false">
                                {{__('Apply')}}
                            </button>
                        </div>
                    </div>
                </div>


                <div class="md:flex flex-col gap-12 hidden">
                    @livewire('frontend.screening.location-screening')
                    @livewire('frontend.offer.category-offers')
                </div>

            </div>
            <div class="md:col-span-4">
                @livewire('frontend.offer.list-offers', [$data])
            </div>
        </div>
    </div>
@endsection
