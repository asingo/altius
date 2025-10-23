<?php

namespace App\Livewire;

use Livewire\Component;

class LanguageSwitcher extends Component
{
    public $locale;

    public $uri;

    public function mount(): void
    {
        $locale = app()->getLocale();
        if($locale != 'id'){
            $this->locale = 'en';
        }
        if($locale != 'en'){
            $this->locale = 'id';
        }
        $uri = \Illuminate\Support\Facades\Request::uri()->path();

        $newUri = explode('/',$uri);
        if($newUri[0] == 'id' || $newUri[0] == 'en'){
            unset($newUri[0]);
        }
        $this->uri = implode('/',$newUri);
        if($uri == '/'){
            $this->uri = '';
        }
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
