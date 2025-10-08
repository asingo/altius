<?php

namespace App\View\Components;

use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Image extends Component
{
    public Media $media;
    public string $class;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $class = '')
    {
        $this->media = Media::find($id);
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.image');
    }
}
