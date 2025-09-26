<?php

namespace App\Livewire\Frontend\Offer;

use Livewire\Component;

class CategoryOffers extends Component
{
    public $data;
    public $category;

    public function categoryChanged()
    {
        $this->dispatch('handleCategoryFilter', $this->category);
    }

    public function mount()
    {
        $this->data = [
            'Promo',
            'Event',
            'Classes'
        ];
    }

    public function render()
    {
        return view('livewire.frontend.offer.category-offers');
    }
}
