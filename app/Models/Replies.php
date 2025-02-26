<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'comment_id',
        'reply'     
       ];

    public function user() {
        
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->belongsTo(Comment::class);
    }
    
}