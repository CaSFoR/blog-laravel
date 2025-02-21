<?php

namespace App\Http\Livewire;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AddComments extends Component
{
   
 
    public function render()
    {
        return view('livewire.add-comments');
    }
    public $user_id;
    public $article_id ; 
    public $comment;
    protected $rules = [
        'comment'=>'max:256|required',
    ];

    public function store(Article $article) {


        $this->validate();
        
        $this->user_id = Auth::id();
        $this->comment = htmlspecialchars(strip_tags($this->comment));
      
        $article->comments()->create([
            'user_id' => $this->user_id,
            'article_id' => $this->article_id,
            'comment' => $this->comment
        ]);

        $this->comment = '';
        $this->emit('commentAdded');
        
    }

    public function resetComment() {
        $this->comment = '';
    }   

    
}