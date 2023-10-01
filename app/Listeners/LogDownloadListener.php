<?php

namespace App\Listeners;

use App\Events\DownloadEvent;
use App\Models\FileDownload;
use App\Models\Stream;
use Illuminate\Support\Facades\DB;

class LogDownloadListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DownloadEvent $event)
    {
        // DB::table('file_downloads')->insert([
        //     'file_id' => $event->file_id,
        //     'time' => now(),
        //     'ip_address' => $event->ip_address,
        //     'user_agent' => $event->user_agent,
        //     'country' => $event->country,
        // ]);
        FileDownload::create([
            'file_id' => $event->file_id,
            'time' => now(),
            'ip_address' => $event->ip_address,
            'user_agent' => $event->user_agent,
            'country' => $event->country,
        ]);
    }
}
