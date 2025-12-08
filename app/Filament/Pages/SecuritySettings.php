<?php

namespace App\Filament\Pages;

use App\Class\RoleManager;
use Filament\Pages\Page;

class SecuritySettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.security-settings';

    public static function canAccess(): bool
    {
        return RoleManager::getAcl('settings', auth()->user()->role, 'view');
    }
}
