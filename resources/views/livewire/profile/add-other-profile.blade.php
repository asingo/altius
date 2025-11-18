<div class=" w-[70%] mx-auto">
    <a href="{{localized_route('profile')}}" class="flex items-center gap-2 mt-6" wire:navigate>
        <x-heroicon-o-chevron-left class="w-5 h-5"/>
        <span class="font-semibold">Add New Profile</span>
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
                <div class="w-1/2 flex gap-2">
                    <a href="{{localized_route('profile')}}" class="w-1/2 text-center  text-primary font-medium border border-primary rounded-xl px-4 py-2"><span>Cancel</span></a>
                    <button type="submit" class="w-1/2 bg-primary font-medium text-white border border-primary rounded-xl px-4 py-2">
                        Save</button>
                </div>
            </div>

        </form>
    </div>

    <script type="module">
        window.addEventListener('successSubmit', (data) =>
            Swal.fire({
                title: `Profile Added Successfully `,
                icon: "success",
                customClass: {
                    confirmButton: "bg-primary hover:bg-accent text-white border border-primary rounded-xl px-4 py-2",
                    popup: "bg-white rounded-2xl shadow p-2 mt-4"
                }
            }).then(() => window.location.href = data.detail[0].url)
        );
    </script>

</div>
