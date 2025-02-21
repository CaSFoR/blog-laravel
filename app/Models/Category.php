<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Array_;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];
    public function articles(){
        return $this->belongsToMany(Article::class,'article_categories');

    }

 
}