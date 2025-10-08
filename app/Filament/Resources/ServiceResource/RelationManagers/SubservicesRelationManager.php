<?php

namespace App\Filament\Resources\ServiceResource\RelationManagers;

use App\Models\Location;
use App\Models\LocationHasSubservice;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\Concerns\Translatable;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class SubservicesRelationManager extends RelationManager
{
    use Translatable;
    protected static string $relationship = 'subservices';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(4)->schema([
                    Forms\Components\Grid::make(1)->schema([
                        TextInput::make('title')->label('Name')
                            ->afterStateUpdated(function ($set, $state) {
                                $set('slug', Str::slug($state));
                            })
                            ->live(onBlur: true)
                            ->required(),
                        Forms\Components\Select::make('location')->label('Location')
                            ->options(fn() => Location::all()->pluck('title', 'id'))
                            ->multiple()
                        ->native(false),
                        Forms\Components\RichEditor::make('content')->label('Content'),
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\LocaleSwitcher::make(),
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->fillForm(function($record){
                        return [
                            'title' => $record->title,
                            'slug' => $record->slug,
                            'location' => $record->hasLocation()->get()->pluck('location_id'),
                            'content' => $record->content,
                            'image' => $record->image,
                        ];

                    })
                    ->action(function ($record, $data) {
                        $location = $data['location'];
                        unset($data['location']);
                        $record->update($data);

                        LocationHasSubservice::where('subservice_id', $record->id)->delete();
                        foreach ($location as $l) {
                            LocationHasSubservice::create([
                                'location_id' => $l,
                                'subservice_id' => $record->id,
                                'service_id' => $record->service_id,
                            ]);
                        }

                        return Notification::make()->success()->title('Berhasil')->body('Data berhasil diubah')->send();
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
