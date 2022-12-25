<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PenetapTTD extends Notification
{
    use Queueable;

    protected $nama_penetap;
    protected $nama_fungsional;
    protected $jabatan;
    protected $periode;
    protected $tgl_ttd;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $nama_penetap, string $nama_fungsional, string $jabatan, string $periode, string $tgl_ttd)
    {
        $this->nama_penetap = $nama_penetap;
        $this->nama_fungsional = $nama_fungsional;
        $this->jabatan = $jabatan;
        $this->periode = $periode;
        $this->tgl_ttd = $tgl_ttd;
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
            ->subject('Tanda Tangan Digital Dokumen Penetapan')
            ->greeting('Hallo!')
            ->line("{$this->nama_penetap} telah melakukan tanda tangan penetapan dokumen {$this->nama_fungsional} {$this->jabatan}
            periode {$this->periode} pada tanggal {$this->tgl_ttd}");
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