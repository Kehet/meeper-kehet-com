<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        View::composer('layouts.footer', function($view) {
            $view->with('tags', Post::allTags()
                                    ->orderBy('count', 'desc')
                                    ->take(5)
                                    ->get());
            $view->with('latest', Post::latest()->take(5)->get());
        });
    }
}
