<?php

namespace App\View\Components\slider;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderTestimony extends Component
{
    public $thumbnail;
    public $profile;
    public $name;
    public $date;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct($thumbnail, $profile, $name, $date, $title)
    {
        $this->thumbnail = $thumbnail;
        $this->profile = $profile;
        $this->name = $name;
        $this->date = $date;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider.slider-testimony');
    }
}
