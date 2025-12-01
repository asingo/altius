<x-filament-panels::page class="feedback-page">
    <div class="grid grid-cols-5 gap-4 border-t" style="height: calc(100vh - 80px)" x-data="{tab: 1}">
        <div class="bg-white h-full p-8 col-span-1 border-r border-b flex flex-col gap-2">
            <div
                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"
                x-on:click="tab = 1"
                :class="tab == 1 ? 'bg-shade text-primary-600':''">
                <x-heroicon-o-globe-alt class="w-5 h-5"/>
                Tracking Snippets
            </div>
        </div>
        <div class="col-span-4 my-6 fi-form">
            <div x-show="tab == 1">
                {{$this->trackingForm}}
            </div>
{{--            <div x-show="tab == 2">--}}
{{--                {{$this->contactForm}}--}}
{{--            </div>--}}
{{--            <div x-show="tab == 3">--}}
{{--                {{$this->ctaForm}}--}}
{{--            </div>--}}
{{--            <div x-show="tab == 4">--}}
{{--                {{$this->emailConfigForm}}--}}
{{--                @livewire('email-tester')--}}
{{--            </div>--}}
        </div>
    </div>
</x-filament-panels::page>
