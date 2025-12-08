<?php

namespace App\Livewire\Frontend\Offer;

use App\Models\Location;
use App\Models\Offers\OffersCategory;
use App\Models\Speciality;
use Filament\Forms\Components\Select;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class FilterMobile extends Component implements HasForms
{
    use InteractsWithForms;

    public $location;
    public $category;

    public function form(Form $form)
    {
        return $form->schema([
            Select::make('location')->label(__('Location'))
                ->options(fn () => Location::all()->pluck('title', 'id')->toArray())
                ->native(false)
                ->live()
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleLocationFilter', $state)),
            Select::make('category')->label(__('Category'))
                ->options(fn () => OffersCategory::get()->pluck('title', 'id')->toArray())
                ->live()
                ->native(false)
                ->afterStateUpdated(fn ($state) => $this->dispatch('handleCategoryFilter', $state)),
        ]);
    }

    public function render()
    {
        return view('livewire.frontend.offer.filter-mobile');
    }
}
