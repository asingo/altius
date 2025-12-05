<div class="md:w-[67%]">
    @if(!session('success'))
        @if($step == 1)
            <form class="w-full create-account-form" wire:submit.prevent="nextStep">
                {{$this->nameForm}}
                @if(session('errorEmail'))
                    <div class="bg-danger-50 text-red-500 mt-4 p-2 rounded-xl">
                        {{__('Email is already in use. Please login instead.')}}
                    </div>
                @endif
                <div class="flex justify-end">
                    <button type="submit"
                            class="py-3 px-6 bg-primary text-white mt-6 text-md w-fit rounded-xl flex items-center justify-center gap-2">{{__('Next')}}</button>
                </div>
            </form>
        @endif
        @if($step == 2)
            <div class="w-full create-account-form">
                <div>
                    <h3 class="text-center">{{__('OTP Verification')}}</h3>
                    <p class="text-center">{{__('We have sent an OTP to your email. Please enter the OTP to verify your email address.')}}</p>
                </div>
                <div
                    x-data="otpForm()"
                    wire:ignore
                    class="grid grid-cols-6 gap-2 mt-4"
                >
                    <template x-for="(val, index) in 6" :key="index">
                        <input
                            type="text"
                            maxlength="1"
                            inputmode="numeric"
                            class="border-2 border-slate-300 rounded-xl p-2 text-center text-3xl"
                            x-ref="inputs"
                            @input="next(index, $event)"
                            @keydown.backspace="back(index)"
                        >
                    </template>
                </div>

                <input type="hidden" wire:model="otp">

                @if(session('successOtp'))
                    <div class="bg-success-50 flex items-center justify-between text-success-500 mt-4 p-2 rounded-xl">
                        {{__('OTP Successfully Sent. Check your email.')}}
                        <x-heroicon-o-check-circle class="w-8 h-8 text-success-500"/>
                    </div>
                @endif
                @if(session('errorOtp'))
                    <div class="bg-danger-50 flex items-center justify-between text-danger-500 mt-4 p-2 rounded-xl">
                        {{__('OTP Wrong or Expired. Please try again.')}}
                        <x-heroicon-o-x-circle class="w-8 h-8 text-danger-500"/>
                    </div>
                @endif

                <div class="text-sm mt-4">
                    {{__("Didn't get OTP?")}}
                    <button wire:click="resendOtp" class="!text-sm text-primary hover:text-accent">
                        {{__('Resend')}}</button>
                </div>
                <div class="flex justify-between">
                    <button wire:click.prevent="prevStep"
                            class="py-3 px-6 border-primary border text-primary mt-6 text-md w-fit rounded-xl flex items-center justify-center gap-2">{{__('Previous')}}</button>
                    <button wire:click.prevent="submitOtp"
                            class="py-3 px-6 bg-primary text-white mt-6 text-md w-fit rounded-xl flex items-center justify-center gap-2">{{__('Submit OTP')}}</button>
                </div>
            </div>
        @endif
        @if($step == 3)
            <form class="w-full create-account-form" wire:submit.prevent="submit">
                {{$this->passwordForm}}
                <div class="flex justify-end">
                    <button type="submit"
                            class="py-3 px-6 bg-primary text-white mt-6 text-md w-full rounded-xl flex items-center justify-center gap-2">{{__('Create Account')}}</button>
                </div>
            </form>
        @endif
        @if(session('error'))
            <div class="bg-danger-50 text-danger-500 mt-4 p-2 rounded-xl">
                There was an error creating your account. Please try again later.
            </div>
        @endif
        <div class="text-center mt-4">
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
    <script>
        function otpForm() {
            return {

                getInputs() {
                    // ✅ Always force array
                    return document.querySelectorAll('[x-ref="inputs"]');
                },

                next(index, event) {
                    let inputs = this.getInputs();
                    event.target.value = event.target.value.replace(/\D/g, '');

                    if (event.target.value && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }

                    this.sync();
                },

                back(index) {
                    let inputs = this.getInputs();

                    if (!inputs[index].value && index > 0) {
                        inputs[index - 1].focus();
                    }

                    this.sync();
                },

                sync() {
                    let inputs = this.getInputs();
                    let otp = '';

                    inputs.forEach(el => otp += el.value);

                    @this.
                    set('otp', otp);
                }
            };
        }
    </script>
</div>
