<?php

namespace Tests\Feature;

use App\Jobs\FetchScreenshotJob;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class RetakeScreenshotControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testInvoke(): void
    {
        $this->loginUser();

        Queue::fake();

        $post = Post::factory()->create();

        $response = $this->postJson(route('retake-screenshot', [$post]));

        Queue::assertPushed(FetchScreenshotJob::class);

        $response->assertRedirectToRoute('posts.show', [$post]);
    }
}
