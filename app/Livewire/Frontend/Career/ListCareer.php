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
    public $department = '';
    public $type = '';

    public function mount($data): void
    {
        $this->data = collect($data);
        $this->filteredData = $this->data;
    }

    public function getPaginatedDataProperty(){
        $offset = ($this->page - 1) * $this->perPage;
        return $this->filteredData->slice($offset, $this->perPage)->values();
    }

    public function render()
    {
        $totalPages = ceil($this->filteredData->count() / $this->perPage);
        return view('livewire.career.list-career',[
            'career' => $this->paginatedData,
            'totalPages' => $totalPages,
        ]);
    }
}
