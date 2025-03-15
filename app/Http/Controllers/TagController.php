<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Post;

class TagController extends Controller
{
    public function __invoke(string $tag)
    {
        $posts = Post::whereTag($tag)->paginate();

        return view('tags.show', compact('posts', 'tag'));
    }
}
