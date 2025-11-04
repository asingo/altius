<?php

namespace App\Livewire\Filament;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Livewire\Component;

class HeaderAction extends Component
{
    public function render()
    {
        // If current Livewire component is a Filament page, it can access its header actions
        if (! $this instanceof Page && ! method_exists($this->getParent(), 'getHeaderActions')) {
            return view('livewire.filament.header-action', ['actions' => []]);
        }

        // `getParent()` gives access to the page that mounted this component
        $parent = $this->getParent();
        $actions = $parent?->getHeaderActions() ?? [];
        return view('livewire.filament.header-action', ['actions' => $this->actions]);
    }
}
