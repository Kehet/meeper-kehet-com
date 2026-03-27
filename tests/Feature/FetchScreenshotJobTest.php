<?php

namespace Tests\Feature;

use App\Jobs\FetchScreenshotJob;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FetchScreenshotJobTest extends TestCase
{
    use RefreshDatabase;

    public function testHandle(): void
    {
        Storage::fake('public');

        $post = Post::factory()->create();

        $job = new class($post) extends FetchScreenshotJob {
            protected function makeRequest(string $tempFile): void
            {
                $image = imagecreatetruecolor(1920, 1080);
                imagepng($image, $tempFile);
            }
        };

        $job->handle();

        Storage::disk('public')
            ->assertExists(
                $post->getFirstMedia('screenshots')
                    ->getPathRelativeToRoot()
            );
    }
}
