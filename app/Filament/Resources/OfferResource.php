<?php

namespace App\Filament\Resources;

use App\Class\RoleManager;
use App\Filament\Resources\OfferResource\Pages;
use App\Filament\Resources\OfferResource\RelationManagers;
use App\Models\Location;
use App\Models\Offer;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use FilamentTiptapEditor\TiptapEditor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Psy\Util\Str;

class OfferResource extends Resource
{
    use Translatable;
    protected static ?string $navigationGroup = 'Offers';
    protected static ?string $model = Offer::class;

    public static function canViewAny(): bool
    {
        return RoleManager::getAcl('offers', auth()->user()->role, 'view');
    }

    public static function canEdit(Model $record): bool
    {
        return RoleManager::getAcl('offers', auth()->user()->role, 'edit');
    }

//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\TextInput::make('title')->label('Name')
                            ->afterStateUpdated(function ($set, $state) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            })
                            ->live(onBlur: true)
                            ->required(),
                        Forms\Components\Select::make('location')
                            ->options(fn() => Location::all()->pluck('title', 'id'))
                            ->native(false)
                            ->multiple()
                            ->label('Location'),
                        Forms\Components\Select::make('offers_category_id')
                            ->relationship('category', 'title')
                            ->native(false)->label('Category'),
                       TiptapEditor::make('content')->label('Content'),
                        Forms\Components\Section::make('SEO Settings')->schema([
                            Forms\Components\TextInput::make('seo_title')
                                ->label('SEO Title')
                                ->placeholder('Enter SEO Title'),
                            Forms\Components\TextInput::make('seo_keyword')
                                ->label('SEO Keyword')
                                ->placeholder('Enter SEO Keyword'),
                            Forms\Components\TextInput::make('seo_description')
                                ->label('SEO Description')
                                ->placeholder('Enter SEO Description'),
                            Forms\Components\Select::make('seo_index')
                                ->label('Indexing Status')
                                ->default(true)
                                ->options([
                                    true => 'Yes',
                                    false => 'No'
                                ])->native(false)
                        ])
                    ])->columnSpan(3),
                    Forms\Components\Grid::make(1)->schema([
                        Forms\Components\Section::make('Page Details')
                            ->schema([
                                Forms\Components\TextInput::make('slug')->unique(ignoreRecord: true)->required(),
                            ])->columnSpan(1),
                        Forms\Components\Section::make('Featured Image')->schema([
                            CuratorPicker::make('image')
                        ])
                    ])->columnSpan(1),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Name'),
                TextColumn::make('category.title')->label('Category'),
                TextColumn::make('hasLocation.location.title')->label('Location'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListOffers::route('/'),
            'create' => Pages\CreateOffer::route('/create'),
            'edit' => Pages\EditOffer::route('/{record}/edit'),
        ];
    }
}
