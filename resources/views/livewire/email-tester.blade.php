<div class="mt-6 border bg-white p-4 rounded-xl">
    <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
        Test Email
    </h3>
    <form wire:submit.prevent="testEmail" class="mt-4">
        {{$this->form}}
        <x-filament::button type="submit" class="mt-4">Send Email</x-filament::button>
    </form>

</div>
