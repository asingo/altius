<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class HideAdmin extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public $hide_login;

    public function mount(): void
    {
        $setting = Setting::where('name', 'hide_login')->first();
        $slug = 'admin';
        if($setting != null){
            if($setting->value[0] != '' && $setting->value[0] != null){
                $slug = $setting->value[0];
            }
        }
        $this->hide_login = $slug;
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('hide_login')->label('Custom Login URL')
                ->placeholder('e.g: login')
                ->helperText('Only users with the custom login URL can access the login page')
        ]);
    }

    public function saveLogin()
    {
        return Action::make('saveLogin')->label('Save')->action(function () {
            $setting = Setting::where('name', 'hide_login')->first();
            if ($setting) {
                $setting->update([
                    'value' => [$this->hide_login]
                ]);
            }else{
                Setting::create([
                    'name' => 'hide_login',
                    'value' => [$this->hide_login]
                ]);
            }
            Notification::make()->success()->title('Success')->body('Setting saved successfully!')->send();
            return redirect()->to('/'. $this->hide_login .'/security-settings');
        });
    }

    public function render()
    {
        return view('livewire.settings.hide-admin');
    }
}
