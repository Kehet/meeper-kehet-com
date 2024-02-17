<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function testIndex(): void
    {
        Post::factory()->count(3)->create();

        $response = $this->get(route('posts.index'));

        $response->assertSuccessful()
            ->assertViewIs('posts.index')
            ->assertViewHas('posts');
    }
}
