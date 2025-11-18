<div class=" w-[70%] mx-auto">
    <a href="{{localized_route('profile')}}" class="flex items-center gap-2 mt-6">
        <x-heroicon-o-chevron-left class="w-5 h-5"/>
        <span class="font-semibold">Detail Profile</span>
    </a>
    <div class="bg-white rounded-2xl shadow p-6 mt-4">
        <div class="flex flex-col gap-1">
            <h2 class="text-lg font-semibold">Patient Profile</h2>
            <span class="text-textsub">Add or manage your own or family member profiles</span>
        </div>
        <div class="mt-6">
            <h2>{{$id == null ? 'My Self' :'Other Profile'}}</h2>
            <div class="mt-4 border rounded-xl px-4 py-2 flex items-center gap-4 space-between w-full">
                @php
                    $photo = 'https://ui-avatars.com/api/?name='. substr($user->name,0,1). '&color=FFFFFF&background=225CA8';
                    if($patient?->photo){
                        $photo ='/storage/'. $patient->photo;
                    }
//                    $patient = $user->patient()?->first();
                @endphp
                <x-filament::avatar
                    size="xl"
                    class="w-16 h-16"
                    :src="$photo"
                />
                <div class="flex flex-col gap-1 flex-1">
                    <h3>Welcome, {{$user->name}} to Altius Hospitals</h3>
                    {{--                        Data Not Complete--}}
                    <div class="bg-warning-50 px-4 py-2 rounded-xl w-fit">
                        <span
                            class="text-warning-500 text-md">Profile incomplete. Please update your information.</span>
                    </div>
                </div>
                <a href="{{localized_route('editProfile', $id != null ? ['id' => $id] : [])}}" wire:navigate
                   class="transition ease-in-out duration-300 my-6 py-3 px-6 hover:bg-primary font-medium text-primary hover:text-white border border-primary text-md rounded-xl flex items-center justify-center gap-2">
                    Edit
                    <x-heroicon-o-pencil-square class="w-5 h-5"/>
                </a>
            </div>
        </div>
        <div class="mt-8">
            <h2 class="font-semibold text-lg">Biography</h2>
            <div class="mt-4 py-4 grid grid-cols-1 md:grid-cols-2 gap-6 w-full border-t-2">
                {{--                  No Profile Found--}}
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">ID Number</span>
                    <span class="">
                        {{$patient->id_number ?? '-'}}
                    </span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Gender</span>
                    <span class=""> {{ucwords($patient->gender) ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Blood Type</span>
                    <span class=""> {{$patient->blood_type ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Date of Birth</span>
                    <span class=""> {{$patient->date_of_birth ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Place of Birth</span>
                    <span class=""> {{$patient->place_of_birth ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Email</span>
                    <span class=""> {{$user->email ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">WhatsApp Number</span>
                    <span class=""> {{$patient->wa_number ?? '-'}}</span>
                </div>
            </div>
        </div>
        <div class="mt-8">
            <h2 class="font-semibold text-lg">Address</h2>
            <div class="mt-4 py-4 grid grid-cols-1 md:grid-cols-2 gap-6 w-full border-t-2">
                {{--                  No Profile Found--}}
                <div class="flex flex-col col-span-2">
                    <span class="text-sm text-gray-600">Address</span>
                    <span class=""> {{$patient->address ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Province</span>
                    <span class=""> {{\App\Models\Wilayah::where('kode',$patient->province)->first()->nama ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">City</span>
                    <span class=""> {{\App\Models\Wilayah::where('kode',$patient->regency)->first()->nama ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Subdistrict</span>
                    <span class=""> {{\App\Models\Wilayah::where('kode',$patient->subdistrict)->first()->nama ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">RT/RW</span>
                    <span class=""> {{$patient->rt_rw ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Postal Code</span>
                    <span class=""> {{$patient->postal_code ?? '-'}}</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm text-gray-600">Street</span>
                    <span class=""> {{$patient->street ?? '-'}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
