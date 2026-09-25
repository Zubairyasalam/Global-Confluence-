<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    public function __construct($registration)
    {
        $this->registration = $registration;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Registration: ' . ($this->registration->name ?? 'N/A') . ' – BioMed Summit 2027',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registration_notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
