<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSubscriptionNotification extends Notification
{
    use Queueable;

    public $newsSubscriber;
    public $subscriber;

    /**
     * Create a new notification instance.
     */
    public function __construct($newsSubscriber, $subscriber)
    {
        $this->newsSubscriber = $newsSubscriber;
        $this->subscriber = $subscriber;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Newsletter Subscriber')
            ->line('A user subscribed to your newsletter.')
            ->line('Newsletter: ' . $this->newsSubscriber->title)
            ->line('Subscriber email: ' . $this->subscriber->email);
    }
    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
