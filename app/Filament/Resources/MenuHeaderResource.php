<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuHeaderResource\Pages;
use App\Filament\Resources\MenuHeaderResource\RelationManagers;
use App\Models\MenuHeader;
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
use Route;

class MenuHeaderResource extends Resource
{
    use Translatable;

    protected static ?string $model = MenuHeader::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->label('Menu Name')->required(),
                Forms\Components\Select::make('page_id')->label('Location')->relationship('pages', 'title')->native(false)->required(),
//                Forms\Components\Select::make('route_name')->label('Page')
//                ->options([
//                    'home' => 'Home',
//                    'about' => 'About',
//                    'location' => 'Location',
//                    'doctor' => 'Medical Professionals',
//                    'career' => 'Career',
//                    'screening' => 'Health Screening',
//                    'contact' => 'Contact',
//                    'news' => 'News',
//                    'offers' => 'Offers',
//                ])->native(false)
//                    ->live()
//                ->afterStateUpdated(function ($state, $set) {
//                    $controller = match ($state) {
//                        'home' => 'App\Http\Controllers\Pages\HomeController',
//                        'about' => 'App\Http\Controllers\Pages\AboutController',
//                        'location' => 'App\Http\Controllers\Pages\LocationController',
//                        'doctor' => 'App\Http\Controllers\Pages\DoctorController',
//                        'career' => 'App\Http\Controllers\Pages\CareerController',
//                        'screening' => 'App\Http\Controllers\Pages\ScreeningController',
//                        'contact' => 'App\Http\Controllers\Pages\ContactController',
//                        'news' => 'App\Http\Controllers\Pages\NewsController',
//                        'offers' => 'App\Http\Controllers\OffersController',
//                    };
//
//                    $set('slug', $controller);
//                }),
//                Forms\Components\Hidden::make('slug')
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
            ->reorderable('index')
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
            'index' => Pages\ListMenuHeaders::route('/'),
//            'create' => Pages\CreateMenuHeader::route('/create'),
//            'edit' => Pages\EditMenuHeader::route('/{record}/edit'),
        ];
    }
}
