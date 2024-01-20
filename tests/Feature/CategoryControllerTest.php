<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testShow(): void
    {
        $category = Category::factory()->create();

        $response = $this->get(route('categories.show', $category));

        $response->assertSuccessful()
            ->assertViewIs('categories.show')
            ->assertViewHas('category', function ($viewCategory) use ($category) {
                return $viewCategory->id === $category->id;
            })
            ->assertViewHas('posts');
    }
}
