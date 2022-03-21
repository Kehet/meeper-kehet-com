<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
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
        View::composer('layouts.footer', static function ($view) {
            $tags = Post::allTags()
                              ->orderBy('count', 'desc')
                              ->take(5)
                              ->get();

            $latest = Post::latest()
                          ->take(5)
                          ->get();

            $categories = Category::withCount('posts')
                                  ->orderBy('posts_count', 'desc')
                                  ->get();
            
            $view->with('tags', $tags);
            $view->with('latest', $latest);
            $view->with('categories', $categories);
        });

        View::composer('posts.partials.form', static function ($view) {
            $view->with('categories', Category::orderBy('name')
                                              ->get()
                                              ->mapWithKeys(function ($category, $key) {
                                                  return [$category->id => $category->name];
                                              }));
        });
    }
}
