<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewsletterUserEmail extends Notification
{
  use Queueable;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function via($notifiable)
  {
    return ['mail'];
  }

  public function toMail($notifiable)
  {
    return (new MailMessage)
      ->from(env('MAIL_FROM_ADDRESS'))
      ->replyTo(env('MAIL_TO'))
      ->subject('luppmenpark.ch – Newsletter Anmeldung')
      ->markdown('mail.newsletter-user', ['data' => $this->data]);
  }

  public function toArray($notifiable)
  {
    return [];
  }
}
