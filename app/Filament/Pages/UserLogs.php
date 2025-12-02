<?php

namespace App\Filament\Pages;

use App\Models\UserLog;
use Filament\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;

class UserLogs extends Page implements HasTable
{
    use InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.user-logs';

    public function table(Table $table): Table
    {
        return $table
            ->query(UserLog::query())
            ->columns([
                TextColumn::make('name'),
            ]);
    }
}
