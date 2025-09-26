@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" subparent="Location" subparentlink="/location" child="{{$title}}"/>
        <div class="mt-8">
            <x-typography.subheading location="page">Altius Hospitals</x-typography.subheading>
            <x-typography.heading location="page">{{$title}}
            </x-typography.heading>
        </div>
        <div class="mt-8">
            <img alt="image" class="rounded-2xl w-full object-cover" src="{{asset($view['image'])}}">
            <div class="grid md:grid-cols-2 mt-12 mb-24">
                <div class="space-y-4 mb-6 md:space-y-6">
                    <h3 class="font-heading text-2xl md:text-3xl">When Your Health Is Our Priority</h3>
                    <p>{{$view['meta']}}</p>
                    <x-button.link href="#">Learn More About Us</x-button.link>
                </div>
                <div class="space-y-6">
                    {!! $view['description'] !!}
                </div>
            </div>
            <h3 class="font-heading text-2xl md:text-3xl">Services and Facilities</h3>
            <div class="mt-12 grid  md:grid-cols-3 gap-10">
                @foreach($view['services'] as $k=>$v)
                    <div x-data="{ show: true }">
                        <div
                            class="flex justify-between cursor-pointer"
                            x-on:click="show = !show"
                        >
                            <span class="text-[24px] font-heading">{{ $v['name'] }}</span>
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
                            class="grid divide-y divide-dashed border-y border-dashed mt-4"
                        >
                            @foreach($v['content'] as $c)
                                <div class="px-4 py-2">
                                    <span class="text-xl text-primary">{{ $c }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="grid md:grid-cols-2 mt-24 mb-12 items-end">
                <div class="space-y-6">
                    <h3 class="font-heading text-2xl md:text-3xl">Contact Us</h3>
                    <p>Addresses and Phone Numbers</p>
                </div>
                <div class="space-y-6">
                    <p>
                        {{$view['address']}}
                    </p>
                </div>
            </div>
            <div class="grid grid-rows-3 items-center">
                <div class="grid-cols-2 grid py-2 items-center border-textsub border-b-2">
                    <div>
                        <span class="font-semibold text-lg text-textsub">Contact</span>
                    </div>
                    <div>
                        <span class="font-semibold text-lg text-textsub">Number</span>
                    </div>
                </div>
                <div class="grid-cols-2 grid border-slate-300 border-b  py-2 items-center">
                    <div>
                        <span class="text-lg text-textsub">General Number</span>
                    </div>
                    <div>
                        <span class="text-lg text-textsub">{{$view['general_number']}}</span>
                    </div>
                </div>
                <div class="grid-cols-2 grid border-slate-300 border-b  py-2 items-center">
                    <div>
                        <span class="text-lg text-textsub">Customer Care</span>
                    </div>
                    <div>
                        <span class="text-lg text-textsub">{{$view['customer_care']}}</span>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
