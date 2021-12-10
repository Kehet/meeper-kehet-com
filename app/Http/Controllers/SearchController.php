<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->get('query');
        $results = [];
        $showResults = false;

        if(!empty($query) && strlen($query) > 3) {
            $results = Post::search($query)->get();
            $showResults = true;
        }

        return view('search.search', compact('results', 'query', 'showResults'));
    }
}
