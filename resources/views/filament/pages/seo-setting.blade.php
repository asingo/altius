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
            <div
                class="flex gap-2 items-center cursor-pointer p-2 text-sm rounded-lg hover:bg-shade hover:text-primary-600"
                x-on:click="tab = 2"
                :class="tab == 2 ? 'bg-shade text-primary-600':''">
                <x-heroicon-o-building-office class="w-5 h-5"/>
                General SEO
            </div>
        </div>
        <div class="col-span-4 my-6 fi-form">
            <div x-show="tab == 1">
                {{$this->trackingForm}}
            </div>
            <div x-show="tab == 2">
                <section x-data="{
        isCollapsed:  false ,
    }" class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                    <header class="fi-section-header flex flex-col gap-3 px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="flex justify-between items-center w-full">
                                <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                                    General SEO Settings
                                </h3>
                            </div>
                        </div>
                    </header>
                    <div class="fi-section-content-ctn border-t border-gray-200 dark:border-white/10">
                        <div class="fi-section-content p-6 space-y-6">
                            <div class="mb-8">
                                <div class="text-sm mb-4">Sitemap Visibility</div>
                                @livewire('generate-sitemap')
                            </div>

                            {{$this->generalForm}}
                        </div>
                    </div>
                </section>

            </div>
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
