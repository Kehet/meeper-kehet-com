<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        abort_unless(Auth::check(), 401);
        $post = new Post();
        return view('posts.create', compact('post'));
    }

    public function store(PostRequest $request): RedirectResponse
    {
        abort_unless(Auth::check(), 401);

        $post = new Post($request->except('tags'));
        Auth::user()->posts()->save($post);

        $post->attachTags(explode(',', $request->get('tags')));

        return redirect()->route('posts.show', [$post->id]);
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

    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        abort_unless(Auth::check(), 401);
        $post->update($request->all());
        return redirect()->route('posts.show', [$post->id]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        abort_unless(Auth::check(), 401);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
