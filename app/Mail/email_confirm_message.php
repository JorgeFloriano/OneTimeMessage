<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class email_confirm_message extends Mailable
{
    public $purl_code;

    public function __construct($purl_code)
    {
        $this->purl_code = $purl_code;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Message confirmation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.email_confirm_message',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
