<?php

namespace App\Console\Commands;

use App\Jobs\FetchScreenshotJob;
use App\Models\Post;
use Illuminate\Console\Command;

class FetchScreenshotsCommand extends Command
{
    protected $signature = 'fetch:screenshots {post?*}';

    protected $description = '';

    public function handle(): void
    {
        if($this->hasOption('post')) {
            foreach ($this->option('post') as $id) {
                $post = Post::find($id);

                if(is_null($post)) {
                    $this->warn('Post id ' . $id . ' not found');
                    continue;
                }

                $post->clearMediaCollection('screenshots');
                FetchScreenshotJob::dispatch($post);
            }

            return;
        }

        Post::all()->each(function ($post) {
            $post->clearMediaCollection('screenshots');
            return FetchScreenshotJob::dispatch($post);
        });
    }
}
