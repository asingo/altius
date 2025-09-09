<?php

namespace App\View\Components\button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Link extends Component
{
    public $href;
    public $class;
    /**
     * Create a new component instance.
     */
    public function __construct($href, $class = '')
    {
        $this->href = $href;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.link');
    }
}
