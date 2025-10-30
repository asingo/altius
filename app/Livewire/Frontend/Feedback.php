<?php

namespace App\Livewire\Frontend;

use App\Forms\Components\RangePicker;
use App\Models\FeedbackResponse;
use App\Models\Setting;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class Feedback extends Component implements HasForms
{
    use InteractsWithForms;

    public $feedback;
    public $responses;

    public function mount(): void
    {
        $feedbackForm = Setting::where('name', 'feedback')->first()?->value ?? [];
        $feedback = collect($feedbackForm['feedback'])->map(function ($item) {
            $item['question'] = app()->getLocale() == 'en' ? $item['question_en'] : $item['question_id'];
            unset($item['question_en'], $item['question_id']);
            return $item;
        });
        $this->feedback = $feedback->toArray();
        foreach ($this->feedback as $key => $item) {
            $this->responses[$key] = null;
        }
//        dd($this->response);
        $this->form->fill(['responses' => $this->responses]);
    }

    public function form(Form $form): Form
    {
        $schema = [];
        foreach ($this->feedback as $key => $item) {

            switch ($item['type']) {
                case 'range':
                    $schema[] = RangePicker::make("responses.{$key}")->label($item['question']);
                    break;

                case 'text':
                    $schema[] = Textarea::make("responses.{$key}")->label($item['question'])->rows(3);
                    break;

                    case 'file':
                    $schema[] = FileUpload::make("responses.{$key}")->label($item['question'])->image()->helperText('Only Image Allowed');
                    break;

                case 'select':
                    $option = collect($item['options'])->mapWithKeys(function ($item, $key) {
                        $itemOption = app()->getLocale() == 'en' ? $item['option_en'] : $item['option_id'];
                        $item[$itemOption] = $itemOption;
                        unset($item['option_en'], $item['option_id']);
                        return $item;
                    })->toArray();
                    $schema[] = Select::make("responses.{$key}")
                        ->label($item['question'])
                        ->options($option);
                    break;
            }
        }
        return $form->schema($schema);
    }

    public function submit()
    {
//        dd($this->form->getState(), $this->feedback);
        $form = $this->form->getState();
        $feedbackData = [];
        foreach($form['responses'] as $key => $response) {

            FeedbackResponse::create([
                'question' => $this->feedback[$key]['question'],
                'type' => $this->feedback[$key]['type'],
                'response' => $response,
            ]);
        }
        return redirect()->route('successFeedback_'.app()->getLocale());

    }


    public function render()
    {
        return view('livewire.frontend.feedback');
    }
}
