<?php

namespace App\Filament\Pages;

use App\Models\UserLog;
use Filament\Pages\Page;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
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
                TextColumn::make('email'),
                TextColumn::make('role')->formatStateUsing(fn ($state) => match($state) {
                    'admin' => 'Admin',
                    'content' => 'Content Manager',
                    'hr' => 'HR'
                }),
                TextColumn::make('ip')->label('IP Address'),
                TextColumn::make('created_at')->dateTime()
            ])
            ->bulkActions([])
            ->defaultSort('created_at', 'desc')
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
