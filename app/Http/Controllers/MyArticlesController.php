<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class MyArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $articles = Auth::user()->articles()->orderBy('id','DESC')->get();

        return view('my-articles',compact('articles'));
    }
}