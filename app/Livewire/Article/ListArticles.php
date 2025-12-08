<?php

namespace App\Livewire\Article;

use Livewire\Component;

class ListArticles extends Component
{
    public $rawData;
    public $perPage = 6;

    public function mount($data): void
    {
        $this->rawData = collect($data);
    }

    public function loadMore()
    {
        $this->perPage += 6;
    }

    public function getDataProperty(){
        return $this->rawData->take($this->perPage);
    }

    public function render()
    {
        $data = $this->data;
        return view('livewire.article.list-articles', ['data' => $data]);
    }
}
