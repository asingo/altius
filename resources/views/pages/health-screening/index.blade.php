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
        <div class="grid grid-cols-5 mt-10">
            <div class="col-span-1">
                <span class="text-xl font-medium">Filter</span>
            </div>
            <div class="col-span-4">
                @livewire('frontend.screening.list-screening', [$data])
            </div>
        </div>
    </div>
@endsection
