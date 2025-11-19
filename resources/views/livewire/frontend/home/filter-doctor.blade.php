<div class="bg-white py-4 pb-6 px-6 rounded-xl filter-doctor drop-shadow-lg">
    <form wire:submit.prevent="findDoctor">
        {{$this->form}}
        <div class="flex justify-end gap-6 mt-4 lg:mt-6">
                <div class="grid grid-cols-2 gap-4">
                    <button wire:click.prevent="resetForm" class="text-primary font-medium border border-primary rounded-xl px-4 py-2"><span>Reset</span></button>
                    <button type="submit" class="bg-primary font-medium text-white border border-primary rounded-xl px-4 py-2">
                        {{__('find.doctor')}}</button>
                </div>
        </div>
    </form>

</div>
