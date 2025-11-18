@extends('template')
@section('content')

    <div class="py-24 px-6 2xl:px-0 mt-6 bg-gray-50">
        <div class="max-w-screen-2xl mx-auto">
            <x-breadcrumb parent="Home" child="{{$title}}"/>
            <div class="bg-white rounded-2xl shadow p-6 w-[70%] mx-auto mt-6">
                <div class="flex flex-col gap-1">
                    <h2 class="text-lg font-semibold">Patient Profile</h2>
                    <span class="text-textsub">Add or manage your own or family member profiles</span>
                </div>
                <div class="mt-6">
                    <h2>My Self</h2>
                    <div class="mt-4 border rounded-xl px-4 py-2 flex items-center gap-4 space-between w-full">
                        @php
                            $photo = 'https://ui-avatars.com/api/?name='. substr(auth()->user()->first_name,0,1). '&color=FFFFFF&background=225CA8';
                            if(auth()->user()->patient()->first()?->photo){
                                $photo ='/storage/'. auth()->user()->patient()->first()->photo;
                            }
                            $patient = auth()->user()->patient()?->first();
                        @endphp
                        <x-filament::avatar
                            size="xl"
                            class="w-16 h-16"
                            :src="$photo"
                        />
                        <div class="flex flex-col gap-1 flex-1">
                            <h3>Welcome, {{auth()->user()->first_name}} to Altius Hospitals</h3>
                            {{--                        Data Not Complete--}}
                            <div class="bg-warning-50 px-4 py-2 rounded-xl w-fit">
                                <span class="text-warning-500 text-md">Profile incomplete. Please update your information.</span>
                            </div>
                        </div>
                        <a href="{{localized_route('detailProfile')}}"
                           class="transition ease-in-out duration-300 my-6 py-3 px-6 hover:bg-primary font-medium text-primary hover:text-white border border-primary text-md rounded-xl flex items-center justify-center gap-2">
                            Detail
                            <x-heroicon-o-eye class="w-5 h-5"/>
                        </a>
                    </div>
                </div>
                <div class="mt-8">
                    <h2>Others</h2>
                    <div
                        class="mt-4 bg-slate-50 rounded-xl px-6 py-4 flex-col flex items-center gap-4 space-between w-full">
                        {{--                  No Profile Found--}}
                        @if(count($other) <= 0)
                            <div class="flex flex-col gap-1 items-center py-10 justify-center w-full gap-2">
                                <x-heroicon-o-users class="w-12 h-12 text-primary"/>
                                <span class="text-slate-500">No other profiles have been added.</span>
                                <a href="{{localized_route('addOtherProfile')}}" wire:navigate
                                   class="transition ease-in-out duration-300 py-3 px-6 hover:bg-primary font-medium text-primary hover:text-white border border-primary text-md rounded-xl flex items-center justify-center gap-2">
                                    Add New Profile
                                </a>
                            </div>
                        @else
                            <div class="flex flex-col gap-4 w-full">
                                @foreach($other as $item)

                                    <div
                                        class=" bg-white border rounded-2xl w-full p-4 flex justify-between items-center">
                                        @php
                                            $photo = 'https://ui-avatars.com/api/?name='. substr($item->name,0,1). '&color=FFFFFF&background=225CA8';
                                            if($item->photo){
                                                $photo ='/storage/'. $item->photo;
                                            }
                                        @endphp
                                        <div class="flex items-center gap-4">
                                            <x-filament::avatar
                                                size="xl"
                                                class="w-16 h-16"
                                                :src="$photo"
                                            />
                                            <span class="text-lg font-medium">{{ucwords($item->name)}}</span>
                                        </div>
                                        <div class="flex gap-4 items-center">
                                            <a href="{{localized_route('detailProfile', ['id'=>$item->id])}}"
                                               class="transition ease-in-out duration-300  py-3 px-6 hover:bg-primary font-medium text-primary hover:text-white border border-primary text-md rounded-xl flex items-center justify-center gap-2">
                                                Detail
                                                <x-heroicon-o-eye class="w-5 h-5"/>
                                            </a>
                                            <a href="#" onclick="deleteProfile({{$item->id}})"
                                               class="text-lg text-danger-600 hover:text-danger-900 font-medium mx-6">Delete</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="{{localized_route('addOtherProfile')}}" wire:navigate
                               class="transition ease-in-out duration-300 py-3 px-6 hover:bg-primary font-medium text-primary hover:text-white border border-primary text-md rounded-xl flex items-center justify-center gap-2">
                                Add New Profile
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
