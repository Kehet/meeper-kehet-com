<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\NewPostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        abort_unless(Auth::check(), 401);

        $post = new Post();
        return view('posts.create', compact('post'));
    }

    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function store(NewPostRequest $request): RedirectResponse
    {
        abort_unless(Auth::check(), 401);

        $post = new Post($request->except(['image', 'tags']));
        $request->user()->posts()->save($post);

        if($request->hasFile('image')) {
            $post->addMedia($request->file('image'))
                ->withResponsiveImages()
                ->toMediaCollection();
        }

        $post->tag($request->input('tags'));

        return redirect()->route('posts.show', [$post]);
    }

    public function show(Post $post)
    {
        $post->load('user');
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        abort_unless(Auth::check(), 401);

        return view('posts.edit', compact('post'));
    }

    /**
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function update(EditPostRequest $request, Post $post): RedirectResponse
    {
        abort_unless(Auth::check(), 401);

        $post->update($request->except(['image', 'tags']));

        if($request->input('remove_old_image', false) && $post->hasMedia()) {
            $post->getFirstMedia()->delete();
        }

        if($request->hasFile('image')) {
            $post->addMedia($request->file('image'))
                ->withResponsiveImages()
                ->toMediaCollection();
        }

        $post->setTags($request->input('tags'));

        return redirect()->route('posts.show', [$post]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        abort_unless(Auth::check(), 401);

        $post->delete();
        return redirect()->route('posts.index');
    }
}
