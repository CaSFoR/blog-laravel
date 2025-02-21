<?php

namespace App\Http\Controllers;

use App\Models\User;


class AuthorProfile extends Controller
{

    public function index($username)
    {

        $author = User::where('username',$username)->first();
        $authorArticles = $author->articles()
        ->latest()
        ->limit(4)
        ->get();
        return view('articles.author_profile',compact('author','authorArticles'));
    }

}