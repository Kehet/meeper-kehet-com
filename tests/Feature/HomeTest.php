<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    public function testListPosts(): void
    {
        $category = Category::factory()
                            ->has(Post::factory()->count(5))
                            ->create();

        $response = $this->get('/');

        $response->assertStatus(200)
                 ->assertSeeText($category->posts->pluck('title')->toArray());
    }

    public function testSeeLoginLinkIfNotLoggedIn(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200)
                 ->assertSeeText('Login');
    }

    public function testSeeLogoutLinkIfLoggedIn(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200)
                 ->assertSeeText('New Post')
                 ->assertSeeText('Log Out');
    }
}
