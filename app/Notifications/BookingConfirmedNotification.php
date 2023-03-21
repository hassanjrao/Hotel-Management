<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingConfirmedNotification extends Notification
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
                    ->subject("Booking Confirmed")
                    ->greeting("Dear {$this->booking->user->name}")
                    ->line("We have received an acceptance email from the hotel regarding your booking reference {$this->booking->booking_id} has been accepted.")
                    ->line("You can cancel this reservation by clicking the cancelation button of this booking in your online account.")
                    ->line("If you need any assistance please email: customerservice@freehotelrooms.net")
                    ->action('Login', url('/'))
                    // kind regards
                    ->salutation("Kind Regards")
                    ->salutation("Customer Service")
                    ->salutation("FreeHotelRooms");
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
