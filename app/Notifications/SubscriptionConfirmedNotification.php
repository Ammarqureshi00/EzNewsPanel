<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubscriptionConfirmedNotification extends Notification implements ShouldQueue
{
    use Queueable;
    public $newsletter;

    /**
     * Create a new notification instance.
     */
    public function __construct($newsletter)
    {
        $this->newsletter = $newsletter;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Subscription Confirmed - ' . $this->newsletter->title)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('Thank you for subscribing to our newsletter!')
            ->line('Newsletter: **' . $this->newsletter->title . '**')
            ->line('You will now receive updates about this topic directly in your inbox.')
            ->action('View Newsletter', url('/news/' . $this->newsletter->slug))
            ->line('If you wish to unsubscribe, you can do so from your account settings.')
            ->salutation('Best regards, EzNewsPanel Team');
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'newsletter_id' => $this->newsletter->id,
            'newsletter_title' => $this->newsletter->title,
            'subscriber_email' => $notifiable->email,
            'subscribed_at' => now(),
        ];
    }
}
