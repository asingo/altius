<?php

namespace App\Livewire\Frontend\Screening;

use App\Models\HealthScreening\HealthScreeningCategory;
use Awcodes\Curator\Models\Media;
use Livewire\Component;

class CategoryScreening extends Component
{
    public $schema;

    public $selected;

    public function mount()
    {
        $data =  HealthScreeningCategory::get()->map(function ($item) {
            return [
                'id' => $item->id,
                'title' => $item->title,
                'icon' => Media::find($item->icon)?->url
            ];

        });
        $all = [
            'id' => "all",
            'title' => "All",
            'icon' => "asset/HealthScreening/Icon/Health/service-all.svg",
            ];
        $others = [
            'id' => "others",
            'title' => "Others",
            'icon' => "asset/HealthScreening/Icon/Line/list.svg",
        ];

        $this->schema = collect([$all])->merge($data)->merge([$others]);

        $this->selected = $this->schema->first()['id'];

        $this->dispatch('handleCategoryFilter', $this->selected);
    }

    public function changeFilter($data)
    {
        $this->selected = $data;
        $this->dispatch('handleCategoryFilter', $this->selected);
    }


    public function render()
    {
        $data = $this->schema;
        return view('livewire.frontend.screening.category-screening', compact("data"));
    }
}
