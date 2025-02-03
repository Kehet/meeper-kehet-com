<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();

        return view('categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();
        return view('categories.show', compact('category', 'posts'));
    }

    public function create()
    {
        abort_unless(Auth::check(), 401);

        $category = new Category();
        return view('categories.create', compact('category'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        abort_unless(Auth::check(), 401);

        Category::create($request->validated());
        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        abort_unless(Auth::check(), 401);

        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        abort_unless(Auth::check(), 401);

        $category->update($request->validated());
        return redirect()->route('categories.index');
    }
}
