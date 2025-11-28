<?php

use App\Providers\DynamicMailServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\DynamicMailServiceProvider::class,
    App\Providers\Filament\AdminPanelProvider::class,
];
