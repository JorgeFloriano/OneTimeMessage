<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class email_message_readed extends Mailable
{
    public $datetime_readed;
    public $recipient_email;

    public function __construct($datetime_readed, $recipient_email)
    {
        $this->datetime_readed = $datetime_readed;
        $this->recipient_email = $recipient_email;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'One Time Message - Message readed'. $this->recipient_email,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.email_message_readed',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
