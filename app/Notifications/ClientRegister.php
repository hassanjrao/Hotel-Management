<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClientRegister extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $user;
    public $invoicePath;
    public function __construct($user, $invoicePath)
    {
        $this->user = $user;
        $this->invoicePath = $invoicePath;
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
                    ->subject("Welcome to ". config('app.name'))
                    ->greeting("Dear ".$this->user->name)
                    ->line('Welome to '.config('app.name'))
                    ->line("Thank you for registering with us and please find attached your invoice.")
                    ->line("We will be mailing your membership card in due course, upon receiving your card we, advice you to sign on the reverse side and keep it save. You need to present the card on your arrival at the hotel.")
                    ->line('Your membership number is: '.$this->user->member_ship_number)
                    ->line("If you need any help, please email us on customerservice@freehotelrooms.net")
                    ->line("We will try to answer your query with 24 hrs.")
                    ->line("We hope you will enjoy our website and wish you happy travels.")
                    ->action('Login', url('/login'))
                    ->line('Thank you for using our application!')
                    // ->attach($this->invoicePath, [
                    //     'as' => 'invoice.pdf',
                    //     'mime' => 'application/pdf',
                    // ]);
                    ;
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
