<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class TagSearchController extends Controller
{
    public function search($tag)
    {
       
        $articles = Article::whereHas('categories', function ($query) use ($tag) {
            $query->where('title', $tag);
        })->paginate(12);
        $categories = Category::orderBy('title','ASC')->get();
        
        return view('articles.index', compact('articles','categories'));
    }
}