<?php

namespace App\Livewire\Settings;

use App\Models\Pages;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\EditAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class MenuHeader extends Component implements HasForms, HasActions, HasTable
{
    use InteractsWithForms, InteractsWithActions, InteractsWithTable;

    public function createHeaderAction(): Action
    {
        return Action::make('createHeader')->label('Create Header Menu')
            ->modalHeading('Create Header Menu')->form([
                Grid::make(2)->schema([
                    TextInput::make('title.en')->label('Menu Name EN')->required(),
                    TextInput::make('title.id')->label('Menu Name ID')->required(),
                ]),
                Select::make('page_id')->label('Location')
                    ->options(fn () => Pages::all()->pluck('title', 'id'))
                    ->native(false)
                    ->required(),
            ])->action(function ($data) {
                \App\Models\MenuHeader::create($data);
                return Notification::make()->success()->title('Success')->body('Menu Header Created Successfully')->send();
            })->modalWidth('xl');
    }

    public function table(Table $table): Table
    {
        return $table->query(\App\Models\MenuHeader::query())->columns([
            TextColumn::make('title')->label('Menu Name'),
            TextColumn::make('pages.slug')->label('Slug'),
            ToggleColumn::make('is_active')->label('Status'),
        ])->filters([
            //
        ])
            ->actions([
                \Filament\Tables\Actions\EditAction::make()
                    ->form([
                        Grid::make(2)->schema([
                            TextInput::make('title.en')->label('Menu Name EN')->required(),
                            TextInput::make('title.id')->label('Menu Name ID')->required(),
                        ]),

                        Select::make('page_id')->label('Location')
                            ->options(fn () => Pages::all()->pluck('title', 'id'))
                            ->native(false)
                            ->required(),
                    ])->modalWidth('xl'),
                DeleteAction::make(),
            ])
            ->defaultSort('index', 'asc')
            ->reorderable('index')
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);;

    }

    public function render()
    {
        return view('livewire.settings.menu-header');
    }
}
