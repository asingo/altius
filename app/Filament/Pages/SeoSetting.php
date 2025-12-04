<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Artisan;
use Awcodes\Curator\Models\Media;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Cache;

class SeoSetting extends Page implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.seo-setting';

    protected static ?string $navigationLabel = 'SEO';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $title = 'SEO Settings';

    public ?array $seo = [];

    public function mount(): void
    {
        $setting = Setting::where('name', 'seo')->first()?->value ?? null;
//        $this->form->fill();
        if ($setting) {
            $this->seo = $setting;
        }
    }

    public function getForms(): array
    {
        return [
            'trackingForm',
            'generalForm'
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('saveSetting')->action(fn () => $this->saveSetting())
                ->icon('heroicon-o-paper-airplane')
                ->iconPosition('after'),
        ];
    }

    public function saveSetting()
    {
        $form = [...$this->trackingForm->getState()];

        $setting = Setting::where('name', 'seo');
        if ($setting->exists()) {
            $setting->update([
                'value' => $form
            ]);
        } else {
            Setting::create([
                'name' => 'seo',
                'value' => $form
            ]);
        }
        Cache::forget('seo_tracking');
        return Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
    }

    public function trackingForm(Form $form): Form
    {
        return $form->schema([
            Section::make('Tracking Configuration')->schema([
                Textarea::make('before_body')->label('Header')
                    ->rows(5),
                Textarea::make('after_body')->label('Body')
                    ->rows(5),
            ])
        ])->statePath('seo');
    }

    public function generalForm(Form $form): Form
    {
        return $form->schema([
            TextInput::make('website_name')->label('Website Name')
                ->placeholder('Used for global metadata and page titles'),
            Split::make([
                Textarea::make('meta_description')->label('Default Meta Description')
                    ->rows(5)
                    ->helperText('Brief description used in search results and social sharing.'),
                Textarea::make('meta_keywords')->label('Default Meta Keywords')
                    ->rows(5)
                    ->helperText('Comma-separated keywords used for General SEO metadata.'),
            ])
        ]);
    }
}
