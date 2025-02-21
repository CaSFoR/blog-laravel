<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorArticles extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($username)
    {
     
        $author = User::with(['articles' => function ($query) {
            $query->orderByDesc('id');
        }])
        ->where('username', $username)
        ->firstOrFail();

         $articles = $author->articles;
          $categories = Category::orderBy('title','ASC')->get();

        return view('articles.author_articles',compact('articles','categories'));
    }

}