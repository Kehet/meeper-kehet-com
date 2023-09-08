<?php

namespace App\Console\Commands;

use App\Jobs\FetchScreenshotJob;
use App\Models\Post;
use Illuminate\Console\Command;

class FetchScreenshotsCommand extends Command
{
    protected $signature = 'fetch:screenshots';

    protected $description = '';

    public function handle(): void
    {
        Post::all()->each(fn($post) => FetchScreenshotJob::dispatch($post));
    }
}
