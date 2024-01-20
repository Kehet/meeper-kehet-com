<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Pagination\LengthAwarePaginator;
use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testInvoke(): void
    {
        $query = 'test';

        $goodPost = Post::factory()->create([
            'title' => $query.' is good',
        ]);

        $badPost = Post::factory()->create([
            'title' => 'bad is bad',
        ]);

        $response = $this->get(route('search').'?query='.$query);

        $response
            ->assertSuccessful()
            ->assertViewIs('search.search')
            ->assertViewHas('query', $query)
            ->assertViewHas('showResults', true);

        $viewResults = $response->viewData('results');

        $this->assertInstanceOf(LengthAwarePaginator::class, $viewResults);
        /** @var LengthAwarePaginator $viewResults */

        $this->assertCount(1, $viewResults);
        $this->assertTrue($viewResults->first()->is($goodPost));
    }

    public function testNoResultsForNoQuery(): void
    {
        $response = $this->get(route('search').'?query=');

        $response
            ->assertSuccessful()
            ->assertViewIs('search.search')
            ->assertViewHas('showResults', false);
    }

    public function testNoResultsForShortQuery(): void
    {
        $response = $this->get(route('search').'?query=a');

        $response
            ->assertSuccessful()
            ->assertViewIs('search.search')
            ->assertViewHas('showResults', false);
    }
}
