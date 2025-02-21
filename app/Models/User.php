<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'address',
        'about_me',
        'password',
        'role_id',
        'avatar',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }


    public function isUser()
    {
        return $this->role_id === 1;
    }
    
    public function isAuther()
    {
        return $this->role_id === 2;
    }

    public function isAdmin()
    {
        return $this->role_id === 3;
    }
    public function articles(){

        return $this->hasMany(Article::class);
    }

    public function comments() {
        
        return $this->hasMany(Comment::class);
    }

    public function replies() {
        
        return $this->hasMany(Comment::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Article::class, 'article_favorites', 'user_id', 'article_id');
    }

    public function isActive()
    {
        return $this->is_active;
    }


}