<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleFavorites;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyFavorite extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        return view('myfavorite.index');
    }

}