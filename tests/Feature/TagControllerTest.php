<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testInvoke(): void
    {
        $goodTag = 'php';
        $goodPost = Post::factory()->create();
        $goodPost->tag($goodTag);

        $badTag = 'js';
        $badPost = Post::factory()->create();
        $badPost->tag($badTag);

        $response = $this->get(route('tags.show', [$goodTag]));

        $response
            ->assertSuccessful()
            ->assertViewIs('tags.show')
            ->assertViewHas('tag', $goodTag);

        $viewPosts = $response->viewData('posts');

        $this->assertInstanceOf(LengthAwarePaginator::class, $viewPosts);
        /** @var LengthAwarePaginator $viewPosts */

        $this->assertCount(1, $viewPosts);
        $this->assertTrue($viewPosts->first()->is($goodPost));
    }
}
