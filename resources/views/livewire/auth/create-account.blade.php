<div>
    {{$step}}
    <div class="flex justify-between gap-4">
        <button wire:click.prevent="prevStep"
                class="py-3 px-6 border border-primary text-primary text-md w-full rounded-xl flex items-center justify-center gap-2">
            Previous
        </button>

            <button wire:click.prevent="nextStep"
                    class="py-3 px-6 bg-primary text-white text-md w-full rounded-xl flex items-center justify-center gap-2">
               @if($step == 2) Create Account @else Next @endif
            </button>


    </div>

</div>
