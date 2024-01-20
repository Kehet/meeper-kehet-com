<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->input('query');
        $results = null;
        $showResults = false;

        if ($query === '' || strlen($query) > 2) {
            $results = Post::search($query)->paginate();

            $showResults = true;
        }

        return view('search.search', compact('results', 'query', 'showResults'));
    }
}
