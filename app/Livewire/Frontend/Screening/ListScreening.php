<?php

namespace App\Livewire\Frontend\Screening;

use Livewire\Component;

class ListScreening extends Component
{
    public $data;
    public $filteredData;
    public $page = 1;
    public $perPage = 6;

    public $category = 'all';
    public $location = 'all';
    public $age = 'all';
    public $gender = 'all';

    protected $listeners = [
        'handleCategoryFilter' => 'handleCategoryFilter',
        'handleLocationFilter' => 'handleLocationFilter',
        'handleAgeFilter' => 'handleAgeFilter',
        'handleGenderFilter' => 'handleGenderFilter',
    ];

    public function handleGenderFilter($data)
    {
        $this->gender = $data;
        $this->applyFilter();
        $this->page = 1;
    }

    public function handleAgeFilter($data)
    {
        $this->age = $data;
        $this->applyFilter();
        $this->page = 1;
    }

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

    public function setPage($page)
    {
        $totalPages = ceil($this->filteredData->count() / $this->perPage);
        if ($page >= 1 && $page <= $totalPages) {
            $this->page = $page;
        }
    }

    public function applyFilter()
    {
        $this->filteredData = $this->data->filter(function ($screening) {
            $matchesCategory = $this->category === 'all' || is_null($screening->health_screening_category_id)
                || $screening->health_screening_category_id == $this->category;
            $matchesLocation = $this->location === 'all' || $screening->hasLocation()->where('location_id', $this->location)->exists();
            $matchesAge = $this->age === 'all' || $screening->hasAge()->where('age_id', $this->age)->exists();
            $matchesGender = $this->gender === 'all' || strtolower($this->gender) === strtolower($screening['gender']);
            return $matchesCategory && $matchesLocation && $matchesAge && $matchesGender;
        });
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
        return view('livewire.frontend.screening.list-screening', [
            'screening' => $this->paginatedData,
            'totalPages' => $totalPages,
        ]);
    }
}
