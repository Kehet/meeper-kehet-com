<?php

namespace App\Jobs;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\RequestException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class FetchScreenshotJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected Post $post)
    {
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws RequestException
     */
    public function handle(): void
    {
        $tempFile = tempnam('/tmp/', config('app.name')).'.png';

        $this->makeRequest($tempFile);

        $this->post->addMedia($tempFile)
            ->withResponsiveImages()
            ->toMediaCollection('screenshots');

        Log::info('Screenshot captured', ['post_id' => $this->post->id]);
    }

    /**
     * @param  string  $tempFile
     *
     * @return void
     *
     * @throws RequestException
     */
    public function makeRequest(string $tempFile): void
    {
        $client = Http::sink($tempFile)
            ->connectTimeout(10)
            ->timeout(70);

        if (App::environment('production')) {
            $client->get(sprintf(
                'https://api.screenshotone.com/take?%s',
                $this->getScreenshotOneOptions()
            ))
                ->throw();
            return;
        }

        $client->get('https://placehold.co/1920x1080.png')
            ->throw();
    }

    /**
     * @return string
     */
    public function getScreenshotOneOptions(): string
    {
        return http_build_query([
            'access_key' => config('services.screenshot-one.key'),
            'url' => $this->post->url,
            'viewport_width' => 1920,
            'viewport_height' => 1080,
            'device_scale_factor' => 1,
            'image_quality' => 80,
            'format' => 'png',
            'block_ads' => 'true',
            'block_cookie_banners' => 'true',
            'block_trackers' => 'true',
            'block_banners_by_heuristics' => 'false',
            'delay' => 0,
            'timeout' => 60,
        ]);
    }
}
