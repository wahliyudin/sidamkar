<?php

namespace App\Jobs;

use App\Models\Periode;
use App\Models\User;
use App\Notifications\PenetapTTD;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendTTDPenetapan implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $nama;
    protected $email;
    protected $periode_concat;
    protected $nama_penetapan;
    protected $tgl_ttd;
    protected $jabatan;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($nama, $periode_concat, $jabatan, $nama_penetapan, $tgl_ttd, $email)
    {
        $this->nama = $nama;
        $this->email = $email;
        $this->periode_concat = $periode_concat;
        $this->nama_penetapan = $nama_penetapan;
        $this->tgl_ttd = $tgl_ttd;
        $this->jabatan = $jabatan;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Notification::route('mail', $this->email)->notify(new PenetapTTD($this->nama_penetapan, $this->user?->userAparatur?->nama, $this->jabatan, $this->periode_concat, $this->tgl_ttd));
    }
}