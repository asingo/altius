<?php

namespace App\Livewire\News;

use Livewire\Component;

class ListNews extends Component
{
    public $rawData;
    public $perPage = 5;

    public function mount($data): void
    {
        $this->rawData = collect($data);
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function getDataProperty(){
        return $this->rawData->take($this->perPage);
    }

    public function render()
    {
        $data = $this->data;
        return view('livewire.news.list-news', ['data' => $data]);
    }
}
