<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    /**
     * Create a new component instance.
     */
    public $parent;
    public $child;
    public $subparentlink;
    public $subparent;
    public function __construct($parent, $child, $subparent = '', $subparentlink ='#')
    {
        $this->parent = $parent;
        $this->child = $child;
        $this->subparent = $subparent;
        $this->subparentlink = $subparentlink;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb');
    }
}
