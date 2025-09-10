<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    public $id;
    public $infinity;
    public $arrow;
    public $centered;
    public $class;
    public function __construct($id, $items = '1', $class = '', $arrow = null, $infinity = 'false', $centered = 'true')
    {
        $this->infinity = $infinity;
        $this->class = $class;
        $this->items = $items;
        $this->arrow = $arrow;
        $this->id = $id;
        $this->centered = $centered;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.slider');
    }
}
