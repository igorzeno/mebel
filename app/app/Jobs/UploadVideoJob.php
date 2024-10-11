<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $url;

    public function __construct($url)
    {
        $this->url =  $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = file_get_contents($this->url);
        $extension = explode('.', $this->url)[2];
        Storage::put(Str::random(5) . '.' . $extension , $file);
//

//        dd($this->url);
//        sleep(10);
//        $filename = $this->url->getClientOriginalName();
//        $extension = $this->url->extension();
//        Storage::put(Str::random(5) . '.' . $extension , $filename);
    }
}
