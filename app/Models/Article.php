<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Database\Factories\ArticleFactory;
use Livewire\WithPagination;

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    use WithPagination;

    protected $fillable = [
        'user_id',
        'slug',
        'title',
        'content',
        'image_path'
    ];

    protected $dates = ['deleted_at'];

    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('title', 'like', '%'.$searchTerm.'%') ;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class,'article_categories');
    }

    public function comments() {
        
        return $this->hasMany(Comment::class);
    }
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'article_id', 'user_id');
    }

    
    
    


}