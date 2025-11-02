<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Blade;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use Session;

class CreateAccount extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

//    protected static ?string $model = \App\Models\User::class;

    public int $step = 1;

    public $data = [];

    public function nextStep()
    {
        $this->step++;
    }

    public function prevStep()
    {
        $this->step--;
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Wizard::make([
                Wizard\Step::make('Account Information')
                    ->description('Enter your personal details.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Fullname')
                            ->placeholder('Enter your fullname')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email')
                            ->placeholder('Enter your email')
                            ->required()
                            ->email()
                            ->unique('users', 'email', ignoreRecord: true),
                    ]),

                Wizard\Step::make('Set Password')
                    ->description('Secure your account.')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->placeholder('Enter your password')
                            ->password()
                            ->revealable()
                            ->required()
                            ->rules([
                                'required',
                                'min:8',
                                'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$/u',
                            ])
                            ->helperText('Use 8+ characters with a mix of letters, numbers, and symbols.'),


                        TextInput::make('password_confirmation')
                            ->label('Confirm Password')
                            ->placeholder('Confirm your password')
                            ->required()
                            ->password()
                            ->revealable()
                            ->same('password'),
                    ]),
            ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                                <button type="submit"
                            class="py-3 px-6 bg-primary text-white text-md w-full rounded-xl flex items-center justify-center gap-2">
                        Create Account
                    </button>
            BLADE))),
        ])->statePath('data');
    }

    public function submit()
    {
        $data = $this->data;
        $data['role'] = 'patient';
        $data['password'] = bcrypt($data['password']);
        unset($data['password_confirmation']);

        DB::beginTransaction();

        try {
            User::create($data);
            DB::commit();

            Session::flash('success', 'Account created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash('error', 'Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.create-account')->layout('auth.layout');
    }
}
