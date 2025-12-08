<?php

namespace App\Livewire;

use Livewire\Component;

class FeedbackResponse extends Component
{
    public $feedback;
    public $response;

    protected $listeners = ['show-response' => 'getResponse'];

    public function mount($feedback, $first)
    {
        $this->feedback = $feedback;
        $this->response = $feedback[$first];
    }

    public function getResponse($question)
    {
        $this->response = $this->feedback[ $question];
    }

    public function render()
    {
        return view('livewire.feedback-response');
    }
}
