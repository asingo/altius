<div class="md:w-[67%]">
    @if(!session('success'))
        <form class="w-full create-account-form" wire:submit.prevent="submit">
            {{$this->form}}
        </form>
        @if(session('error'))
            <div class="bg-danger-50 text-danger-500 mt-4 p-2 rounded-xl">
                There was an error creating your account. Please try again later.
            </div>
        @endif
    <div class="text-center">
        {{__('Have an account?')}}
        <a href="{{localized_route('login')}}"
           class="text-primary hover:text-accent">
            {{__('Login Here')}}
        </a>
    </div>

    @else
        <div class="flex items-center gap-4 bg-green-50 p-4 rounded-2xl justify-center">
            <x-heroicon-o-check-circle class="w-8 h-8 text-green-500"/>
            <span class="text-lg font-medium text-green-500">{{__('Account Created Successfully')}}</span>
        </div>
        <a href="{{localized_route('login')}}"
           class="py-3 px-6 bg-primary text-white mt-6 text-md w-full rounded-xl flex items-center justify-center gap-2">
            {{__('Back to Login')}}
        </a>
    @endif
</div>
