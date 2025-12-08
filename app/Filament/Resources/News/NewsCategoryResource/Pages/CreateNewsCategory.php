<?php

namespace App\Filament\Resources\News\NewsCategoryResource\Pages;

use App\Filament\Resources\News\NewsCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsCategory extends CreateRecord
{
    protected static string $resource = NewsCategoryResource::class;
}
