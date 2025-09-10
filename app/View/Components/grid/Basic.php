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
    /**
     * Create a new component instance.
     */
    public function __construct($image, $heading, $description = null)
    {
        $this->image = $image;
        $this->heading = $heading;
       $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grid.basic');
    }
}
