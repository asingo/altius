<x-filament-panels::page>
    <form wire:submit.prevent="saveSetting">
        {{$this->form}}
        <x-filament::button type="submit" class="mt-6">Submit</x-filament::button>
    </form>
</x-filament-panels::page>
