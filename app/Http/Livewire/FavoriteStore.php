<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\ArticleFavorites;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class FavoriteStore extends Component
{
    public $article_id = null;
    public $fav_acticle = null;

    public function render()
    {
        return view('livewire.favorite-store');
    }

    public function store($article_id)
    {

        $article = Article::findOrFail($article_id);
        if (!$article) {
            abort(404);
        }
        
       if(!auth()->user()){
        
        session()->flash('message', 'Login First');
        
       }elseif (auth()->user()->favorites()->where('article_id', $article_id)->exists()) {
        
            session()->flash('message', 'Article is already in favorites');
            
          }else{
            
            ArticleFavorites::create([
                'article_id' => $article_id,
                'user_id' => auth()->user()->id,
             ]); 
             session()->flash('storedArticle', 'Article has been added to favorites');
          }
       

    }


}