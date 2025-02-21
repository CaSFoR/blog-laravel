<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ArticleFavorites as Favorite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticleFavorites extends Component
{
    protected $listeners = ['favorite' => '$refresh'];

    public function render()
    {
        // $articles = DB::table('articles')
        // ->Join('article_favorites', 'articles.id', '=', 'article_favorites.article_id')
        // ->select('articles.*', 'article_favorites.*')
        // ->where('article_favorites.user_id',auth()->user()->id)
        // ->get();
        $user = auth()->user();
        $articles = $user->favorites()->with('categories')->get();
        
        return view('livewire.article-favorites',compact('articles'));
    }

    public function destroy($article_id)
    {

        // Find the favorite record
        $favorite = Favorite::where('user_id', auth()->user()->id)->where('article_id', $article_id)->first();

        // Check if the Article is in the user's favorites
        if (!$favorite) {
            abort(404);
        }

            $favorite->delete();
           
            $this->emit('favorite');
            
    }
}