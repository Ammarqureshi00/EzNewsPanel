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
    public $subscriberName;
    public $subscriberEmail;


    /**
     * Create a new notification instance.
     */
    public function __construct($newsletter, $subscriberEmail, $subscriberName = null)
    {
        $this->newsletter = $newsletter;
        $this->subscriberEmail = $subscriberEmail;
        $this->subscriberName = $subscriberName;
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $name = $this->subscriberName ?? 'Subscriber';

        return (new MailMessage)
            ->subject('Subscription Confirmed - ' . $this->newsletter->title)
            ->greeting('Hello ' . $name)
            ->line('Thank you for subscribing to our newsletter!')
            ->line('Newsletter: **' . $this->newsletter->title . '**')
            ->line('You will now receive updates about this topic directly in your inbox.')
            ->action('View Newsletter', url('/news/' . $this->newsletter->slug))
            ->line('If you wish to unsubscribe, you can do so from your account settings.')
            ->salutation('Best regards, EzNewsPanel Team');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable)
    {
        return [
            'newsletter_id' => $this->newsletter->id,
            'newsletter_title' => $this->newsletter->title,
            'subscriber_email' => $this->subscriberEmail,
            'subscribed_at' => now(),
        ];
    }
}
