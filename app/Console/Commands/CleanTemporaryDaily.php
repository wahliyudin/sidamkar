<?php

namespace App\Console\Commands;

use App\Models\TemporaryFile;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CleanTemporaryDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:temporary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Membersihkan temporary';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $temporaries = TemporaryFile::query()->get();
        foreach ($temporaries as $temporary) {
            if (date_diff(now(), $temporary->created_at)->h >= 1) {
                Storage::deleteDirectory("tmp/$temporary->folder");
                $temporary->delete();
            }
        }
    }
}
