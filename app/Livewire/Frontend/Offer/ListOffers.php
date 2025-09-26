<?php

namespace App\Livewire\Frontend\Offer;

use Livewire\Component;

class ListOffers extends Component
{
    public $data;
    public $filteredData;
    public $location = 'all';
    public $page = 1;
    public $perPage = 6;
    public $category = 'All';

    protected $listeners = [
        'handleCategoryFilter' => 'handleCategoryFilter',
        'handleLocationFilter' => 'handleLocationFilter',
    ];

    public function handleCategoryFilter($data)
    {
        $this->category = $data;
        $this->applyFilter();
        $this->page = 1;
    }

    public function handleLocationFilter($data)
    {
        $this->location = $data;
        $this->applyFilter();
        $this->page = 1;
    }

    public function applyFilter(){
        $this->filteredData = $this->data->filter(function($item) {
           $matchesLocation = $this->location === 'all' || strtolower($item['location']) === strtolower($this->location);
           $matchesCategory = $this->category === 'All' || strtolower($item['category']) === strtolower($this->category);
           return $matchesLocation && $matchesCategory;
        });
    }

    public function setPage($page)
    {
        $totalPages = ceil($this->filteredData->count() / $this->perPage);
        if ($page >= 1 && $page <= $totalPages) {
            $this->page = $page;
        }
    }

    public function getPaginatedDataProperty()
    {
        $offset = ($this->page - 1) * $this->perPage;
        return $this->filteredData->slice($offset, $this->perPage)->values();
    }

    public function mount($data): void
    {
        $this->data = collect($data);
        $this->filteredData = $this->data;
    }

    public function render()
    {
        $totalPages = ceil($this->filteredData->count() / $this->perPage);
        return view('livewire.frontend.offer.list-offers', [
            'totalPages' => $totalPages,
            'offers'=> $this->paginatedData
        ]);
    }
}
