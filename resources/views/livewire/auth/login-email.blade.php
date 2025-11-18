<div class="w-[67%]">
    <form wire:submit.prevent="login" class="fi-form">
        {{$this->form}}

        @if(session('errors'))
        <div class="bg-danger-50 text-danger-500 mt-4 p-2 rounded-xl">
            {{session('errors')}}
        </div>
        @endif
        <button type="submit"
                class="my-6 py-3 px-6 bg-primary text-white text-md w-full rounded-xl flex items-center justify-center gap-2">
            Continue Login
        </button>
    </form>
    <div class="text-center">
        Don't have an account yet?
        <a href="{{localized_route('register')}}"
           class="text-primary hover:text-accent">
            Create Account
        </a>
    </div>
</div>
