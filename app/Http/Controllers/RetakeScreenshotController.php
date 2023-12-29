<?php

namespace App\Http\Controllers;

use App\Jobs\FetchScreenshotJob;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class RetakeScreenshotController extends Controller
{
    public function __invoke(Post $post)
    {
        abort_unless(Auth::check(), 401);

        $post->clearMediaCollection('screenshots');
        FetchScreenshotJob::dispatch($post);

        return redirect()->route('posts.show', [$post]);
    }
}
