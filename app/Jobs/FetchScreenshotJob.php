<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use Spatie\Browsershot\Exceptions\CouldNotTakeBrowsershot;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class FetchScreenshotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct( protected Post $post)
    {
    }

    /**
     * @throws CouldNotTakeBrowsershot
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function handle(): void
    {
        $tempFile = tempnam('/tmp/',  config('app.name')) . '.png';

        Browsershot::url($this->post->url)
            ->setScreenshotType('png')
            ->windowSize(1920, 1080)
            ->fullPage()
            ->save($tempFile);

        $this->post->addMedia($tempFile)
                ->withResponsiveImages()
                ->toMediaCollection('screenshots');

        Log::info('Screenshot captured', ['post_id' => $this->post->id]);
    }
}
