@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}" />
        <div class="mt-8">
            <x-typography.subheading location="page">Our Locations</x-typography.subheading>
            <x-typography.heading location="page" class="mt-4">Find an Altius Hospital near you
            </x-typography.heading>
        </div>
        <div>
            @foreach($data as $v)
                <div>
                    <div>
                        <img src="{{asset($v->thumbnail)}}" alt=""/>
                    </div>
                    <div>
                        <h3>{{$v->title}}</h3>
                        <span>{{$v->meta}}</span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
