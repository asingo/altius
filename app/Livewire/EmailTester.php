<?php

namespace App\Livewire;

use App\Mail\TestMail;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EmailTester extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public $data;

    public function mount(){
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
                TextInput::make('receipient_email')->email()
                    ->label('Receipient')
                    ->required(),
                TextInput::make('subject')->required(),
                Textarea::make('message')->required()->columnSpanFull(),
        ])->columns(2)->statePath('data');
    }

    public function testEmail()
    {
        $form = $this->form->getState();

        try{
            Mail::to($form['receipient_email'])
                ->send(new TestMail(
                    $form['subject'],
                    $form['message']
                ));
            Notification::make()->success()->title('Success')->body('Test email sent successfully.')->send();
        }catch (\Exception $e){
            Notification::make()->error()->title('Error')->body($e->getMessage())->send();
        }


//        return response()->json([
//            'message' => 'Test email sent successfully.'
//        ]);
//        Mail::to($form['receipient_email'])->send(new TestEmail($form['subject'], $form['message']));
    }

    public function render()
    {
        return view('livewire.email-tester');
    }
}
