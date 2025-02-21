<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function search(Request $request){
           $request->validate([
                'q' => 'required|string',
            ]);
    
        $search = $request->input('q');
        $articles = Article::where('title', 'like', "%$search%")->paginate(10);
        $categories = Category::orderBy('title','ASC')->get();


        return view('articles.index', compact('articles', 'categories'));
       
    }

}