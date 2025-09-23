<?php

namespace App\Livewire\Frontend\Doctor;

use Livewire\Component;

class ListDoctors extends Component
{
    public $data;
    public $filteredData;
    public $page = 1;
    public $perPage = 5;
    public $search = '';
    public $location = '';
    public $speciality = '';
    public $date = '';

    protected $listeners = [
        'handleSearch' => 'handleSearch',
        'handleLocationFilter' => 'handleLocationFilter',
        'handleSpecialityFilter' => 'handleSpecialityFilter',
        'handleDateFilter' => 'handleDateFilter',
    ];

    public function mount($data): void
    {
        $this->data = collect($data);
        $this->filteredData = $this->data;
    }

    public function handleLocationFilter($data)
    {
        $this->location = $data;
        $this->applyFilter();
        $this->page = 1;
    }

    public function handleDateFilter($data)
    {
        $this->date = $data;
        $this->applyFilter();
        $this->page = 1;
    }

    public function handleSearch($search)
    {
        $this->search = $search['query'];
        $this->applyfilter();
        $this->page = 1; // reset to first page after search
    }

    public function handleSpecialityFilter($speciality)
    {
        $this->speciality = $speciality;
        $this->applyFilter();
        $this->page = 1;
    }



    protected function applyFilter()
    {
        $this->filteredData = $this->data->filter(function ($doctor) {
            $matchesSearch = $this->search === ''
                || str_contains(strtolower($doctor['name']), strtolower($this->search));

            $matchesSpeciality = $this->speciality === '' || strtolower($this->speciality) === 'all'
                || str_contains(strtolower($doctor['speciality']), strtolower($this->speciality));

            $matchesLocation = $this->location === '' || strtolower($this->location) === 'all'
                || collect($doctor['location'])->contains(function ($location) {
                    return str_contains(strtolower($location['name']), strtolower($this->location));
                });

            $matchesDate = $this->date === ''
                || strtolower($this->date) === 'all'
                || collect($doctor['location'])->contains(function ($location) {
                    $day = strtolower($this->date);

                    return isset($location['schedule'][$day])
                        && $location['schedule'][$day] !== '-';
                });

            return $matchesSearch && $matchesLocation && $matchesSpeciality && $matchesDate;
        })->values();

    }

    public function getPaginatedDataProperty()
    {
        $offset = ($this->page - 1) * $this->perPage;
        return $this->filteredData->slice($offset, $this->perPage)->values();
    }

    public function setPage($page)
    {
        $totalPages = ceil($this->filteredData->count() / $this->perPage);
        if ($page >= 1 && $page <= $totalPages) {
            $this->page = $page;
        }
    }

    public function render()
    {
        $totalPages = ceil($this->filteredData->count() / $this->perPage);
        return view('livewire.doctor.list-doctors', [
            'doctors' => $this->paginatedData,
            'totalPages' => $totalPages,
        ]);
    }
}
