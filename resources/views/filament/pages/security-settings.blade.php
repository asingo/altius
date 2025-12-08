<x-filament-panels::page class="feedback-page">
    <div class="grid grid-cols-5 gap-4 border-t min-h-screen" x-data="{tab: 1}">
        <div class="bg-white h-full p-8 col-span-1 border-r border-b flex flex-col gap-2">
            <div
                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"
                x-on:click="tab = 1"
                :class="tab == 1 ? 'bg-shade text-primary-600':''">
                <x-heroicon-o-eye-slash class="w-5 h-5"/>
                Hide Login
            </div>
            <div
                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"
                x-on:click="tab = 2"
                :class="tab == 2 ? 'bg-shade text-primary-600':''">
                <x-heroicon-o-shield-exclamation class="w-5 h-5"/>
                Role Management
            </div>
        </div>
        <div class="col-span-4 my-6 fi-form">
            <div x-show="tab == 1">
                <div class="grid grid-cols-2">
                    @livewire('settings.hide-admin')
                </div>
            </div>
            <div x-show="tab == 2" class="mr-6">
                @livewire('settings.role-management')
            </div>

        </div>
    </div>

</x-filament-panels::page>
