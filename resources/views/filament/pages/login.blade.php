<div class="grid grid-cols-2 items-center gap-8 min-h-screen">
    <div style="background-image: url('{{asset('asset/image-cover-altius.webp')}}');" class="bg-cover bg-center h-screen">
{{--        <img src="{{asset('asset/image-cover-altius.webp')}}" class="w-full object-cover" alt=""/>--}}
    </div>
    <div>
        @if (filament()->hasRegistration())
            <x-slot name="subheading">
                {{ __('filament-panels::pages/auth/login.actions.register.before') }}

                {{ $this->registerAction }}
            </x-slot>
        @endif
        <div class="bg-white p-8 rounded-xl shadow-lg mx-20">
            <section class="grid auto-cols-fr gap-y-6">
                <x-filament-panels::header.simple
                    :heading="$heading ??= $this->getHeading()"
                    :logo="$this->hasLogo()"
                    :subheading="$subheading ??= $this->getSubHeading()"
                />
            </section>

            {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_BEFORE, scopes: $this->getRenderHookScopes()) }}

            <x-filament-panels::form id="form" wire:submit="authenticate">
                {{ $this->form }}

                <x-filament-panels::form.actions
                    :actions="$this->getCachedFormActions()"
                    :full-width="$this->hasFullWidthFormActions()"
                />
            </x-filament-panels::form>

            {{ \Filament\Support\Facades\FilamentView::renderHook(\Filament\View\PanelsRenderHook::AUTH_LOGIN_FORM_AFTER, scopes: $this->getRenderHookScopes()) }}
        </div>
        <div class="text-center mt-4">
            <small>© {{date('Y')}} Altius Hospitals. All rights reserved.</small>
        </div>


    </div>

</div>
