<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class Greeting extends Widget
{
    protected static string $view = 'filament.widgets.greeting';

    protected int | string | array $columnSpan = 'full';

    public function getAvatar()
    {
        $user = auth()->user();
        $initial = collect(explode(' ', $user->name))->map(function($item){
            $item = substr($item, 0, 1);
            return $item;
        })->toArray();
        return 'https://ui-avatars.com/api/?name='.implode('+', $initial).'&color=FFFFFF&background=225CA8';
    }
}
