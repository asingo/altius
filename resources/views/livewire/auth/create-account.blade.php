<div class="w-[67%]">
    @if(!session('success'))
        <form class="w-full create-account-form" wire:submit.prevent="submit">
            {{$this->form}}
{{--            @if(session('error'))--}}
{{--                <div class="bg-red-50 p-4 rounded-2xl mt-4">--}}
{{--            <span class="text-red-500 text-lg">--}}
{{--               Email already Exists please try using another email. {{session('error')}}--}}
{{--            </span>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="flex justify-between gap-4 mt-6">--}}
{{--                @if($step > 1)--}}
{{--                    <button wire:click.prevent="prevStep"--}}
{{--                            class="py-3 px-6 border border-primary text-primary text-md w-full rounded-xl flex items-center justify-center gap-2">--}}
{{--                        Previous--}}
{{--                    </button>--}}
{{--                @endif--}}
{{--                @if($step == 2)--}}
{{--                    <button type="submit"--}}
{{--                            class="py-3 px-6 bg-primary text-white text-md w-full rounded-xl flex items-center justify-center gap-2">--}}
{{--                        Create Account--}}
{{--                    </button>--}}
{{--                @else--}}
{{--                    <button wire:click.prevent="nextStep"--}}
{{--                            class="py-3 px-6 bg-primary text-white text-md w-full rounded-xl flex items-center justify-center gap-2">--}}
{{--                        Next--}}
{{--                    </button>--}}
{{--                @endif--}}

{{--            </div>--}}
        </form>
        @if(session('error'))
            <div class="bg-danger-50 text-danger-500 mt-4 p-2 rounded-xl">
                There was an error creating your account. Please try again later.
            </div>
        @endif
    <div class="text-center">
        Have an account?
        <a href="{{route('login')}}"
           class="text-primary hover:text-accent">
            Login Here
        </a>
    </div>

    @else
        <div class="flex items-center gap-4 bg-green-50 p-4 rounded-2xl justify-center">
            <x-heroicon-o-check-circle class="w-8 h-8 text-green-500"/>
            <span class="text-lg font-medium text-green-500">Account Created Successfully</span>
        </div>
        <a href="{{route('login')}}"
           class="py-3 px-6 bg-primary text-white mt-6 text-md w-full rounded-xl flex items-center justify-center gap-2">
            Back to Login
        </a>
    @endif
</div>
