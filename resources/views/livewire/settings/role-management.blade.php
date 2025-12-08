<div>
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold">Role Management</h3>
        <x-filament::button wire:click="saveRole">Save Settings</x-filament::button>
    </div>

    <div class="mt-6">
        {{$this->form}}
    </div>

</div>
