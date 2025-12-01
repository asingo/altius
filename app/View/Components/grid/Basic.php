<?php

namespace App\View\Components\grid;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Basic extends Component
{
    public $image;
    public $heading;
    public $description;
    public $slug;
    public $price;
    public $equal;
    /**
     * Create a new component instance.
     */
    public function __construct($image, $heading, $description = '', $slug = '', $price = '', $equal = false)
    {
        $this->image = $image;
        $this->slug = $slug;
        $this->heading = $heading;
       $this->description = $description;
       $this->price = $price;
       $this->equal = $equal;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grid.basic');
    }
}
