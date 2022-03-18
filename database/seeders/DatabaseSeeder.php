<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Kehet',
            'email' => 'kehet@example.com',
        ]);

        $category = Category::factory()->count(5)->create();

        Post::factory()
            ->for($user)
            ->for($category->random())
            ->count(10)
            ->create();
    }
}
