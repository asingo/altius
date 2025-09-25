<?php

namespace App\Livewire\Frontend\Screening;

use Livewire\Component;

class CategoryScreening extends Component
{
    public $schema =  [
        [
            "name" => "Vaccine",
            "icon" => "asset/HealthScreening/Icon/Health/Vaccine.svg"
        ], [
            "name" => "Lite Check Up",
            "icon" => "asset/HealthScreening/Icon/Health/lite-checkup.svg"
        ], [
            "name" => "Heart Screening",
            "icon" => "asset/HealthScreening/Icon/Health/heart-screening.svg"
        ], [
            "name" => "General Check Up",
            "icon" => "asset/HealthScreening/Icon/Health/general-checkup.svg"
        ], [
            "name" => "Others",
            "icon" => "asset/HealthScreening/Icon/Line/list.svg"
        ]
    ];

    public $selected;
    public function mount(){
        $this->selected = $this->schema[0];
        $this->dispatch('handleCategoryFilter', $this->selected);
    }

    public function changeFilter($data)
    {
        $this->selected = $this->schema[$data];
        $this->dispatch('handleCategoryFilter', $this->selected);
    }


    public function render()
    {
        $data = $this->schema;
        return view('livewire.frontend.screening.category-screening', compact("data"));
    }
}
