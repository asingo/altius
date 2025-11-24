<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Models\Media;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class SliderSettings extends Page implements HasForms
{
    use InteractsWithForms;

//    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Slider';

    protected static string $view = 'filament.pages.slider-settings';

    public $formData;

    public function mount(): void
    {
        $getSetting = Setting::where('name', 'slider')->first();
        if ($getSetting) {
            $this->formData = $getSetting->value;
            $this->formData['video'] =[ Media::find($getSetting->value['video'])];
        } else {
            $this->formData = [
                'heading_en' => '',
                'description_en' => '',
                'heading_id' => '',
                'is_video' => '',
                'video' => [],
                'description_id' => '',
                'is_item_text' => false,
            ];
        }

    }

    protected function getHeaders(): array
    {
        return [
            'breadrumbs' => $this->getBreadcrumbs(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '#' => 'Slider',
            '' => 'Setting'
        ];
    }

    public function form(Form $form): Form
    {
//        dd($this->formData);
        return $form->schema([
            Split::make([
                TextInput::make('heading_en')->label('Heading EN'),
                TextInput::make('heading_id')->label('Heading ID'),
            ]),
            Split::make([
                TextInput::make('description_en')->label('Description EN'),
                TextInput::make('description_id')->label('Description ID'),
            ]),
            Toggle::make('is_item_text')->label('Use Slider Item Heading and Description'),
            Toggle::make('is_video')->label('Use Video as a Slider'),
            CuratorPicker::make('video')->label('Video Slider')
                ->helperText('Maximum File Size is 50 MB')
                ->acceptedFileTypes(['video/*'])->maxSize(50000),

        ])->statePath('formData');
    }

    public function saveSetting()
    {
        $formData = $this->form->getState();
        $formData['video'] = $formData['video'];
        $setting = Setting::where('name', 'slider');
        if ($setting->exists()) {
            $setting->update([
                'name' => 'slider',
                'value' => $formData
            ]);
        } else {
            Setting::create([
                'name' => 'slider',
                'value' => $formData
            ]);
        }
        return Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
    }
}
