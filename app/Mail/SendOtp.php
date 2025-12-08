<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOtp extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $subject;

    /**
     * Create a new message instance.
     */
    public function __construct($otp)
    {
        $this->subject = 'Verify OTP - '.config('app.name');
        $this->otp = $otp;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify OTP - '.config('app.name'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $setting = \App\Models\Setting::where('name','general')->first()?->value;
        return new Content(
            view: 'emails.otp.send',
            with: [
                'logo' => \Awcodes\Curator\Models\Media::find($setting['site']['logo_primary'])?->url,
                'otp' => $this->otp,
                'socmeds' => $setting['contact']['social_media'],
                'subject' => $this->subject
            ]

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
