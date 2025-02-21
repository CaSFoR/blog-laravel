<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use \App\Models\Article;
use App\Models\Category;
use Whoops\Run;

class PageControllerIndex extends Controller
{
    //
    public function index(){
        $articles = Article::take(3)->orderBy('id','DESC')->get();
        $categories = Category::orderBy('title','ASC')->get();
        return view('index',compact('articles', 'categories'));
    }

    
 



}