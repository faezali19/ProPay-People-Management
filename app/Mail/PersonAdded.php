<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PersonAdded extends Mailable
{
    use Queueable, SerializesModels;
    public $person;

    public function __construct($person)
    {
        $this->person = $person;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Person Added',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.person-added',
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
