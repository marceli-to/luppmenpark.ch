<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class SubscriberListMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(protected string $csvPath, protected int $subscriberCount)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'luppmenpark.ch – Newsletter Abonnenten',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.subscriber-list',
            with: ['subscriberCount' => $this->subscriberCount],
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromPath($this->csvPath)
                ->as('newsletter-abonnenten.csv')
                ->withMime('text/csv'),
        ];
    }
}
