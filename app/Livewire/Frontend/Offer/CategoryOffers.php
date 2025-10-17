<?php

namespace App\Livewire\Frontend\Offer;

use App\Models\Offer;
use App\Models\Offers\OffersCategory;
use Livewire\Component;

class CategoryOffers extends Component
{
    public $data;
    public $category = 'all';

    public function categoryChanged()
    {
        $this->dispatch('handleCategoryFilter', $this->category);
    }

    public function mount()
    {
        $categories = OffersCategory::get()->pluck('title', 'id')->toArray();
        $this->data = [
            'all'=> 'All',
            ] + $categories;
    }

    public function render()
    {
        return view('livewire.frontend.offer.category-offers');
    }
}
