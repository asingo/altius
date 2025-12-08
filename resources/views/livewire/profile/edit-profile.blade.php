<div class="md:w-[70%] mx-auto">
    <a href="{{localized_route('detailProfile', $id != null ? ['id' => $id] : [])}}"
       class="flex items-center gap-2 mt-6" wire:navigate>
        <x-heroicon-o-chevron-left class="w-5 h-5"/>
        <span class="font-semibold">{{__('Edit Profile')}}</span>
    </a>
    <div class="bg-white rounded-2xl shadow p-6 mt-4">
        <form wire:submit.prevent="submitProfile" class="edit-profile">
            <div class="mt-4 flex items-center gap-4 space-between w-full">
                {{$this->photoForm}}
            </div>
            <div class="mt-8">
                {{$this->form}}
            </div>
            <div class="mt-4 flex justify-end">
                <div class="w-full md:w-1/2 flex gap-2">
                    <a href="{{localized_route('detailProfile',  $id != null ? ['id' => $id] : [])}}"
                       class="w-1/2 text-center  text-primary font-medium border border-primary rounded-xl px-4 py-2"><span>{{__('Cancel')}}</span></a>
                    <button type="submit"
                            class="w-1/2 bg-primary font-medium text-white border border-primary rounded-xl px-4 py-2">
                        {{__('Save')}}
                    </button>
                </div>
            </div>

        </form>
    </div>

    <script type="module">
        window.addEventListener('successSubmit', () => Swal.fire({
            title: "{{__('Profile Updated Successfully')}}",
            icon: "success",
            buttonsStyling: false,
            customClass: {
                popup: "bg-white rounded-2xl shadow p-6 mt-4",
            }
        }));
    </script>

</div>
