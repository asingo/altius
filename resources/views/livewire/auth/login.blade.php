<div class="flex flex-col gap-3 w-1/2">
    <a href="{{route('loginEmail')}}" wire:navigate
       class="py-3 px-6 bg-primary text-white text-md w-full rounded-xl flex items-center justify-center gap-2">
        <x-heroicon-o-envelope class="w-6 h-6"/>
        Login with Email
    </a>
    <a href="{{route('register')}}" wire:navigate
       class="py-3 px-6 border border-primary text-primary text-md w-full rounded-xl flex items-center justify-center gap-2">
        Create Account
    </a>
</div>
