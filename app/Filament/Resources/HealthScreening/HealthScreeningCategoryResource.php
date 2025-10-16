<?php

namespace App\Filament\Resources\HealthScreening;

use App\Filament\Resources\HealthScreening;
use App\Filament\Resources\HealthScreeningCategoryResource\Pages;
use App\Filament\Resources\HealthScreeningCategoryResource\RelationManagers;
use App\Models\HealthScreening\HealthScreeningCategory;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class HealthScreeningCategoryResource extends Resource
{
    use Translatable;

    protected static ?string $model = HealthScreeningCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Health Screening';
    protected static ?string $slug = 'health-screening/categories';
    protected static ?string $navigationLabel = 'Category';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Name')->required(),
                CuratorPicker::make('icon')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('icon')->label('Icon')
                    ->getStateUsing(fn ($record) => Media::find($record->icon)->url),
                TextColumn::make('title')->label('Name'),
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
            'index' => HealthScreening\HealthScreeningCategoryResource\Pages\ListHealthScreeningCategories::route('/'),
//            'create' => HealthScreening\HealthScreeningCategoryResource\Pages\CreateHealthScreeningCategory::route('/create'),
//            'edit' => HealthScreening\HealthScreeningCategoryResource\Pages\EditHealthScreeningCategory::route('/{record}/edit'),
        ];
    }
}
