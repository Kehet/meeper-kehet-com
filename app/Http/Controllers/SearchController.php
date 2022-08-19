<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->get('query');
        $results = null;
        $showResults = false;

        if(!empty($query) && strlen($query) > 2) {
            $results = Post::with('category', 'tags')
                ->where('title', 'like', '%'.$query.'%')
                ->orWhere('body', 'like', '%'.$query.'%')
                ->orWhere('url', 'like', '%'.$query.'%')
                ->paginate();

            $showResults = true;
        }

        return view('search.search', compact('results', 'query', 'showResults'));
    }
}
