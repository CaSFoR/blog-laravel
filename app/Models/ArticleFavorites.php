<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleFavorites extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'article_id',
        'category_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function post()
    {
        return $this->belongsTo(Article::class);
    }

}