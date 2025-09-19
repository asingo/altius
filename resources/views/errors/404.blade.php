@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <div class="flex w-full flex-col gap-2 items-center">
            <img src="{{asset('asset/404.svg')}}" alt="404"/>
            <h3 class="text-2xl font-semibold">Oops! Page Not Found</h3>
        </div>

    </div>
@endsection
