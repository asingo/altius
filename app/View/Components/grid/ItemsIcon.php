<?php

namespace App\View\Components\grid;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ItemsIcon extends Component
{
    public $icon;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct($icon, $title)
    {
        $this->icon = $icon;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grid.items-icon');
    }
}
