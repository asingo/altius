<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{

    use Queueable, SerializesModels;

    public string $contentMessage;
    public string $subj;

    public function __construct(
        public string $subjectText,
        public string $content
    )
    {
        $this->contentMessage = $content;
        $this->subj = $subjectText;
    }

    public function build()
    {
        return $this
            ->subject($this->subjectText)
            ->markdown('emails.test.smtp');
    }
}
