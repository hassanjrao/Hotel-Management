<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReservationUserNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $booking;
    public function __construct($booking)
    {
        $this->booking = $booking;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject("Booking {$this->booking->booking_id} request received")
                    ->greeting("Dear {$this->booking->user->name}")
                    ->line('We have received your reservation and passed it on to the hotel for approval.')
                    ->line("Booking Reference: {$this->booking->booking_id}")
                    ->line("Please go to your account on our portal to find the details.")
                    ->line("We will inform the customer of your decision by email.")
                    ->line("If you need any assistance please email: customerservice@freehotelrooms.net")
                    ->action('Login', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
