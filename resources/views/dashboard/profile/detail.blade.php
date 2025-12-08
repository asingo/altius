@extends('template')
@section('content')
    <div class="py-24 px-6 2xl:px-0 mt-6 bg-gray-50">
        <div class="max-w-screen-2xl mx-auto ">
            <x-breadcrumb parent="Home" subparent="{{__('Profile')}}" subparentlink="{{localized_route('profile')}}" child="{{$title}}"/>
            {{$slot}}
        </div>

    </div>
@endsection
