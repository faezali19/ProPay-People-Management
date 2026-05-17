<?php

namespace App\Mail;

use App\Models\Person;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PersonCapturedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Person $person) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Person Captured');
    }

    public function content(): Content
    {
        return new Content(view: 'emails.person-captured');
    }
}