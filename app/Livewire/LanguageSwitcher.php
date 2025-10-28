<?php

namespace App\Livewire;

use Livewire\Component;
use Request;

class LanguageSwitcher extends Component
{
    public $locale;

    public $uri;

    public $route;

    public $param = null;

    public function mount(): void
    {
        $route = request()->route();

        // Gracefully handle when route is null (e.g., included in shared layout)
        if (!$route || !$route->getName()) {
            $this->locale = app()->getLocale() === 'id' ? 'id' : 'en';
            $this->uri = '';
            $this->route = '';
            return;
        }

        $locale = app()->getLocale();
        $this->locale = $locale === 'id' ? 'id' : 'en';

        // Get session if any
        if ($session = session('single_content')) {
            $this->param = $session['slug'] ?? null;
        }

        // Get current URI path (no leading slash)
        $uri = request()->path();

        // Route base name
        $this->route = explode('_', $route->getName())[0] ?? '';

        // Remove locale prefix if exists
        $segments = explode('/', $uri);
        if (in_array($segments[0], ['id', 'en'])) {
            array_shift($segments);
        }

        $this->uri = implode('/', $segments);
    }

    public function switchLocale($locale, $href)
    {
        app()->setLocale($locale);
        return redirect($href);
    }

    public function render()
    {
        return view('livewire.language-switcher');
    }
}
