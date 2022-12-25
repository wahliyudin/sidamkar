<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserReject extends Notification
{
    use Queueable;

    private string $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $message = null)
    {
        $this->message = $message ?? 'Akun anda ditolak karena data tidak sesuai';
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
            ->subject('Verifikasi Akun')
            ->greeting('Ooops! Akun Anda Ditolak')
            ->line($this->message)
            ->action('Silahkan register ulang!', route('register'));
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