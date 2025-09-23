@extends('template')
@section('content')
    @filamentStyles()
    <div class="h-[700px] relative"
         style="background-image: url({{asset('asset/doctor/hero-medical-profesional.jpg')}})">
        <div class="h-full relative" style="background: rgba(0,0,0,0.2)">
            <div class="absolute text-white max-w-screen-2xl mx-auto px-6 2xl:px-0 left-0 bottom-8 right-0">
                <h3 class="text-[24px] text-white font-semibold">Doctors and Medical Staff</h3>
                <x-typography.heading class="text-white">Explore Our Doctors by Using the Options Below
                </x-typography.heading>
            </div>
        </div>
    </div>
    <div class="max-w-screen-2xl mx-auto py-16 px-6 2xl:px-0">
        <x-breadcrumb parent="Home" child="Medical Professionals"/>
            <div class="mt-10">
                <div class="grid lg:grid-cols-3 lg:gap-24 gap-10">
                    <div
                        x-data="{ open: false }"
                        class="lg:col-span-1 space-y-6"
                    >
                        <!-- Header -->
                        <div
                            class="flex justify-between items-center lg:hidden"
                            @click="open = !open"
                        >
                            <span class="text-2xl font-semibold">Filter Doctor</span>
                            <x-heroicon-o-adjustments-horizontal
                                class="w-8 h-8 cursor-pointer"
                            />
                        </div>

                        <!-- Mobile Dropdown -->
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="space-y-6 lg:hidden"
                        >
                            @livewire('doctor.location-doctor')
                            @livewire('doctor.speciality-doctor')
                            @livewire('doctor.date-doctor')
                        </div>

                        <!-- Always visible on desktop -->
                        <div class="space-y-6 hidden lg:block">
                            @livewire('doctor.location-doctor')
                            @livewire('doctor.speciality-doctor')
                            @livewire('doctor.date-doctor')
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        @livewire('doctor.search-doctor')
                        @livewire('doctor.list-doctors', ['data' => $data])
                    </div>
                </div>

            </div>
    </div>
    @filamentStyles()
@endsection
