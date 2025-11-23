@php use Awcodes\Curator\Models\Media; @endphp
@extends('template')
@section('content')
    @filamentStyles()
    <div class="h-[700px] relative"
         style="background-image: url({{Media::find($page->image)->url}}); background-position: center center; background-size: cover;">
        <div class="h-full relative" style="background: rgba(0,0,0,0.2)">
            <div class="absolute text-white max-w-screen-2xl mx-auto px-6 2xl:px-0 left-0 bottom-1/2 top-1/2 right-0">
                <h1 class="text-5xl text-white mb-4 font-semibold">{{$page->content['section']['heading']}}</h1>
                <h3 class="text-white text-3xl">{{$page->content['section']['subheading']}}
                </h3>
            </div>
        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto py-16 px-6 2xl:px-0">
        <x-breadcrumb parent="Home" child="{{$page->title}}"/>
        <div class="md:mt-10">
            <div x-data="{ open: false }" class="grid lg:grid-cols-5 lg:gap-12 gap-10">
                <div
                    class="lg:col-span-1 space-y-6"
                >
                    <div class="space-y-6 hidden lg:block">
                        <livewire:frontend.doctor.location-doctor key="desktop"/>
                        <livewire:frontend.doctor.speciality-doctor key="desktop"/>
                        <livewire:frontend.doctor.date-doctor key="desktop"/>

                    </div>
                </div>

                <div class="lg:col-span-4">
                    @livewire('frontend.doctor.search-doctor')
                    <!-- Header -->
                    <div
                        class="transition-all duration-300 ease-in-out flex items-center w-fit gap-2 lg:hidden mt-6 border border-primary text-primary hover:bg-primary hover:text-white py-2 px-4 rounded-2xl cursor-pointer"
                        @click="open = !open"
                    >
                        <span class="text-xl">Filter Doctor</span>
                        <x-heroicon-o-adjustments-horizontal
                            class="w-6 h-6 cursor-pointer"
                        />
                    </div>

                    <!-- Modal -->
                    <div class="fixed z-50 inset-0 flex items-center justify-center" x-show="open">
                        <div class="fixed inset-0 bg-gray-900 opacity-75"></div>
                        <div class="bg-white rounded-lg p-6 relative max-w-xl mx-auto">
                            <div class="absolute top-0 right-0 text-gray-400 hover:text-red-500 cursor-pointer"
                                 @click="open = false">
                                <x-heroicon-o-x-mark class="w-6 h-6"/>
                            </div>
                            <div class="space-y-6">
                                <livewire:frontend.doctor.location-doctor key="mobile"/>
                                <livewire:frontend.doctor.speciality-doctor key="mobile"/>
                                <livewire:frontend.doctor.date-doctor key="mobile"/>
                            </div>
                        </div>
                    </div>
                    @livewire('frontend.doctor.list-doctors', ['data' => $data])
                </div>
            </div>

        </div>
    </div>
    @filamentStyles()
@endsection
