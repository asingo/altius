<div class="shadow-grid p-6 rounded-xl">
   <h3 class="text-2xl font-medium">Apply this position</h3>
    <p class="mt-4">Please fill in all information completely and correctly. Candidates who pass the selection process will be contacted by phone or email.</p>
    <div class="mt-6">
        <form wire:submit.prevent="submitCareer" class="careerForm">
            {{$this->form}}
            <button class="flex gap-2 items-center text-xl mt-6 bg-primary justify-center text-white w-full py-2.5 rounded-xl font-medium">Apply Now <x-heroicon-o-chevron-right class="w-5 stroke-2"/></button>
        </form>

    </div>
</div>
