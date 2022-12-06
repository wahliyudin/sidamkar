<?php

namespace App\Jobs;

use App\Notifications\UserReject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendRejectToUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $catatan;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $catatan)
    {
        $this->user = $user;
        $this->catatan = $catatan;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new UserReject($this->catatan));
    }
}