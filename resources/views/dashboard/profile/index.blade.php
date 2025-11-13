@extends('template')
@section('content')
    <div class="max-w-screen-2xl mx-auto py-24 px-6 2xl:px-0 mt-6">
        <x-breadcrumb parent="Home" child="{{$title}}"/>
        <div class="bg-white rounded-2xl shadow p-6 w-[70%] mx-auto">
            <div class="flex flex-col gap-1">
                <h2 class="text-lg font-semibold">Patient Profile</h2>
                <span class="text-textsub">Add or manage your own or family member profiles</span>
            </div>
            <div class="mt-6">
                <h2>My Self</h2>
                <div class="mt-4 border rounded-xl px-4 py-2 flex items-center gap-4 space-between w-full">
                    <x-filament::avatar
                        size="xl"
                        src="https://ui-avatars.com/api/?name=A&color=FFFFFF&background=225CA8"
                    />
                    <div class="flex flex-col gap-1 flex-1">
                        <h3>Welcome, Snowy to Altius Hospitals</h3>
{{--                        Data Not Complete--}}
                        <div class="bg-warning-50 px-4 py-2 rounded-xl w-fit">
                            <span class="text-warning-500 text-md">Profile incomplete. Please update your information.</span>
                        </div>
                    </div>
                    <button
                            class="transition ease-in-out duration-300 my-6 py-3 px-6 hover:bg-primary font-medium text-primary hover:text-white border border-primary text-md rounded-xl flex items-center justify-center gap-2">
                        Edit <x-heroicon-o-pencil-square class="w-5 h-5"/>
                    </button>
                </div>
            </div>
            <div class="mt-8">
                <h2>Others</h2>
                <div class="mt-4 bg-slate-50 rounded-xl px-6 py-4 flex items-center gap-4 space-between w-full">
{{--                  No Profile Found--}}
                    <div class="flex flex-col gap-1 items-center py-10 justify-center w-full gap-2">
                        <x-heroicon-o-users class="w-12 h-12 text-primary"/>
                        <span class="text-slate-500">No other profiles have been added.</span>
                        <button
                            class="transition ease-in-out duration-300 py-3 px-6 hover:bg-primary font-medium text-primary hover:text-white border border-primary text-md rounded-xl flex items-center justify-center gap-2">
                            Add New Profile
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
