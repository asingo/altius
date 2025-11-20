<?php

namespace App\Livewire\Frontend\Career;

use App\Models\Career\CareerCategory;
use App\Models\Career\Department;
use Livewire\Component;

class TypeCareer extends Component
{
    public $data;

    public $type = 'All';

    public function mount(): void
    {
        $locale = 'en';
        $type = CareerCategory::get()->mapWithKeys(function ($item) use ($locale) {
            return [$item->id => $item->getTranslation('title', $locale)];
        })->toArray();

        $this->data = [
                'All' => 'All'
            ] + $type;
    }

    public function typeChanged()
    {
        $this->dispatch('handleTypeFilter', $this->type);
    }

    public function render()
    {
        return view('livewire.career.type-career');
    }
}
