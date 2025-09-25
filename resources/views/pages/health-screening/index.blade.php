@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
        <div class="mt-8">
            <x-typography.subheading location="page">{{$title}}</x-typography.subheading>
            <x-typography.heading location="page" class="mt-4">Your Health in Your Hands
            </x-typography.heading>
        </div>
        <div class="mt-6">
            @livewire('frontend.screening.category-screening')
        </div>
        <div class="mt-8 hidden md:block">
            <span class="text-xl font-medium">Filter</span>
        </div>
        <div class="grid md:grid-cols-5 mt-8 gap-12">
            <div class="md:col-span-1" x-data="{ open: false }">
                <div
                    class="flex justify-between cursor-pointer items-center md:hidden"
                    @click="open = !open"
                >
                    <span class="text-2xl font-semibold">Filter</span>
                    <x-heroicon-o-adjustments-horizontal
                        class="w-8 h-8 cursor-pointer"
                    />
                </div>
                <div class="flex flex-col gap-12 mt-10 md:mt-0" x-show="open"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 transform -translate-y-2"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 transform translate-y-0"
                     x-transition:leave-end="opacity-0 transform -translate-y-2"
                >
                    @livewire('frontend.screening.location-screening')
                    @livewire('frontend.screening.age-screening')
                    @livewire('frontend.screening.gender-screening')
                </div>

                <div class="md:flex flex-col gap-12 hidden">
                    @livewire('frontend.screening.location-screening')
                    @livewire('frontend.screening.age-screening')
                    @livewire('frontend.screening.gender-screening')
                </div>

            </div>
            <div class="md:col-span-4">
                @livewire('frontend.screening.list-screening', [$data])
            </div>
        </div>
    </div>
@endsection
