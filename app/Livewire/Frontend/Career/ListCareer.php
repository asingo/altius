<?php

namespace App\Livewire\Frontend\Career;

use Livewire\Component;

class ListCareer extends Component
{
    public $data;
    public $filteredData;
    public $page = 1;
    public $perPage = 5;
    public $search = '';
    public $department = 'All Department';
    public $type = 'All';
    protected $listeners = [
        'handleTypeFilter' => 'handleTypeFilter',
        'handleDepartmentFilter' => 'handleDepartmentFilter',
        'handleSearch' => 'handleSearch',
    ];

    public function mount($data): void
    {
        $this->data = collect($data);
        $this->filteredData = $this->data;
    }

    public function handleTypeFilter($data)
    {
        $this->type = $data;
        $this->applyFilter();
        $this->page = 1;
    }

    public function handleSearch($data)
    {
        $this->search = $data;
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

    public function handleDepartmentFilter($data)
    {
        $this->department = $data;
        $this->applyFilter();
        $this->page = 1;
    }

    public function applyFilter()
    {
        $this->filteredData = $this->data->filter(function ($career) {
            $matchesSearch = $this->search === '' ||
                str_contains(strtolower($career['title']), strtolower($this->search));
            $matchesType = $this->type === 'All'
                || strtolower($career['type']) == strtolower($this->type);
            $matchesDepartment = $this->department === 'All Department' || strtolower($career['departement']) == strtolower($this->department);
            return $matchesSearch && $matchesType && $matchesDepartment;
        })->values();
    }

    public function getPaginatedDataProperty()
    {
        $offset = ($this->page - 1) * $this->perPage;
        return $this->filteredData->slice($offset, $this->perPage)->values();
    }

    public function render()
    {
        $totalPages = ceil($this->filteredData->count() / $this->perPage);
        return view('livewire.career.list-career', [
            'career' => $this->paginatedData,
            'totalPages' => $totalPages,
        ]);
    }
}
