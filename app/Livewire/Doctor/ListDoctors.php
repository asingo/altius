<?php

namespace App\Livewire\Doctor;

use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;

class ListDoctors extends Component
{
    public $data;
    public $filteredData;
    public $page = 1;
    public $perPage = 5;
    public $search = '';

    protected $listeners = [
        'handleSearch' => 'handleSearch',
    ];

    public function mount($data): void
    {
        $this->data = collect($data);
        $this->filteredData = $this->data;
    }

    public function handleSearch($search)
    {
        $this->search = $search['query'];
        $this->applySearch();
        $this->page = 1; // reset to first page after search
    }

    protected function applySearch()
    {
        $this->filteredData = $this->data->filter(function ($doctor) {
            return str_contains(strtolower($doctor['name']), strtolower($this->search));
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
