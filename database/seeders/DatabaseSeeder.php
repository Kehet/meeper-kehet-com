<?php

namespace Database\Seeders;

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

        Post::factory()
            ->for($user)
            ->count(10)
            ->create();
    }
}
