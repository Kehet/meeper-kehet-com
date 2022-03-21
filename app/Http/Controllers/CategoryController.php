<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate();
        return view('categories.show', compact('category', 'posts'));
    }
}
