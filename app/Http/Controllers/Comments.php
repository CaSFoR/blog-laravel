<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Replies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Comments extends Controller
{
    //

   public function commentReplyStore(Request $request){
    $request->validate([
        'comment_id' => 'required|numeric',
        'reply' => 'required|min:3',
    ]);
    $comment_id = Comment::findOrFail($request->comment_id);

    $user_id = Auth::id();
    $reply = htmlspecialchars(strip_tags($request['reply']));


    
    Replies::create([
        'user_id' => $user_id ,
        'comment_id' =>  $comment_id->id,
        'reply' => $reply
    ]);

    $reply = '';    
    return redirect()->back();
    }
    


   public function deleteCommentForm($id){
    
    $comment = Comment::findOrFail($id);
    if(Auth::id() != $comment->user_id){
        return abort(401);
    }
       $comment->delete();
   
    session()->flash('message','Comment Deleted 💔');
    return redirect()->back();
}
   
}