<x-filament-panels::page class="feedback-page">
{{--    <form wire:submit.prevent="saveSetting">--}}
{{--        {{$this->siteForm}}--}}
{{--        <x-filament::button type="submit" class="mt-6">Save</x-filament::button>--}}
{{--    </form>--}}
    <div class="grid grid-cols-5 gap-4 border-t" style="height: calc(100vh - 80px)" x-data="{tab: 1}">
        <div class="bg-white h-full p-8 col-span-1 border-r border-b flex flex-col gap-2">
            <div
                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"
                x-on:click="tab = 1"
                :class="tab == 1 ? 'bg-shade text-primary-600':''">
                <x-heroicon-o-globe-alt class="w-5 h-5"/>
                Site Information
            </div>
            <div
                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"
                x-on:click="tab = 2"
                :class="tab == 2 ? 'bg-shade text-primary-600':''">
                <x-heroicon-o-building-office class="w-5 h-5"/>
                Company Information
            </div> <div
                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"
                x-on:click="tab = 3"
                :class="tab == 3 ? 'bg-shade text-primary-600':''">
                <x-heroicon-o-chat-bubble-bottom-center-text class="w-5 h-5"/>
                CTA
            </div>
{{--            <div--}}
{{--                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"--}}
{{--                x-on:click="tab = 3"--}}
{{--                :class="tab == 3 ? 'bg-shade text-primary-600':''">--}}
{{--                <x-heroicon-o-envelope class="w-5 h-5"/>--}}
{{--                Email Configuration--}}
{{--            </div>--}}

        </div>
        <div class="col-span-4 my-6 fi-form">
            <div x-show="tab == 1">
                {{$this->siteForm}}
            </div>
            <div x-show="tab == 2">
                {{$this->contactForm}}
            </div>
            <div x-show="tab == 3">
                {{$this->ctaForm}}
            </div>
        </div>
    </div>
</x-filament-panels::page>
