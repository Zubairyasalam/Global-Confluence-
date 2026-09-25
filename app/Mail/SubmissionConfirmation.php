<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SubmissionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Abstract Submission Received – BioMed Summit 2027',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.submission_confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
