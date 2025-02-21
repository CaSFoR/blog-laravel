<?php

namespace App\Http\Livewire;


use App\Models\Comment;
use App\Models\Replies;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Comments extends Component
{

        public $article_id ;
        public $user_id;
        public $comment_id ;
        public $reply;
        
        protected $listeners = ['commentAdded' => '$refresh'];

        protected $rules = [
            'reply' => 'required|max:256',
        ];
        public function mount($article_id)
        {
            $this->article_id = $article_id;
        }
    public function render()
    {
        $comments = Comment::with('replies')->where('article_id',$this->article_id)->get();
    
        return view('livewire.comments',compact('comments'));
    }

  
    public function storeReply($comment_id){
        
        $this->validate();

        $comment = Comment::findOrFail($comment_id);

        $this->user_id = Auth::id();
        $this->reply = htmlspecialchars(strip_tags($this->reply));
      
        Replies::create([
            'user_id' => $this->user_id,
            'comment_id' => $comment->id,
            'reply' => $this->reply,
        ]);

        $this->reply = '';
        $this->emit('replyAdded');
 

    }

    

    
    public function deleteComment($id) {

        $comment = Comment::findOrFail($id);
        if(Auth::id() != $comment->user_id){
            return abort(401);
        }
           $comment->delete();
        
       
        session()->flash('message','Comment Deleted 💔');
    }

    
    public function deleteReply($id) {

        $reply = Replies::findOrFail($id);
        if(Auth::id() != $reply->user_id){
            return abort(401);
        }
           $reply->delete();
        
       
        session()->flash('message','Reply Deleted 💔');
    }

}