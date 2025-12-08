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
    public $type;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $category, $date, $slug, $type = 'news')
    {
        $this->title = $title;
        $this->category = $category;
        $this->date = $date;
        $this->slug = $slug;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.grid.news-grid');
    }
}
