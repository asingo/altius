<?php

namespace App\View\Components\grid;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewsGrid extends Component
{
    public $title;
    public $category;
    public $date;
    public $slug;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $category, $date, $slug)
    {
        $this->title = $title;
        $this->category = $category;
        $this->date = $date;
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grid.news-grid');
    }
}
