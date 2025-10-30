<div class="max-w-md mx-auto p-6 bg-white space-y-6">
    <form wire:submit.prevent="submit">
       {{$this->form}}
        <div class="w-full justify-center flex">
            <button type="submit" class="bg-primary font-medium mx-auto mt-6 text-white border border-primary rounded-xl px-4 py-2">Submit</button>
        </div>
    </form>
</div>
