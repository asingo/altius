<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuFooterResource\Pages;
use App\Filament\Resources\MenuFooterResource\RelationManagers;
use App\Models\MenuFooter;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuFooterResource extends Resource
{
    use Translatable;
    protected static ?string $model = MenuFooter::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Menu Name')->required(),
                Forms\Components\Select::make('page_id')->label('Location')->relationship('pages', 'title')->native(false)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Menu Name'),
                TextColumn::make('pages.slug')->label('Slug'),
                Tables\Columns\ToggleColumn::make('is_active')->label('Status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuFooters::route('/'),
//            'create' => Pages\CreateMenuFooter::route('/create'),
//            'edit' => Pages\EditMenuFooter::route('/{record}/edit'),
        ];
    }
}
