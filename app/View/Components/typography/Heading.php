<?php

namespace App\View\Components\typography;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
    public $class;
    public $location;

    /**
     * Create a new component instance.
     */
    public function __construct($class = '', $location = 'section')
    {
        $this->class = $class;
        $this->location = $location;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.typography.heading');
    }
}
