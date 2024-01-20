<?php

namespace Tests\Feature;

use App\Jobs\FetchScreenshotJob;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Tests\TestCase;

class FetchScreenshotJobTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @throws RequestException
     * @throws FileIsTooBig
     * @throws FileDoesNotExist
     */
    public function testHandle(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()
            ->image('test.png');

        Http::preventStrayRequests();
        Http::fake([
            'https://placehold.co/1920x1080.png' => Http::response($file->getContent()),
        ]);

        $post = Post::factory()->create();

        $job = new FetchScreenshotJob($post);
        $job->handle();

        Storage::disk('public')
            ->assertExists(
                $post->getFirstMedia('screenshots')
                    ->getPathRelativeToRoot()
            );
    }
}
