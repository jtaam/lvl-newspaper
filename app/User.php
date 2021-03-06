<?php

namespace App;

use App\Models\Blog\Comment;
use App\Models\Blog\Post;
use App\Models\News\NewsArticle;
use App\Models\News\NewsComment;
use App\Models\Site\UserProfile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Blog posts
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
    // User profile
    public function profile(){
        return $this->hasOne(UserProfile::class);
    }
    // Comments
    public function comments(){
//        return $this->hasMany('App\Models\Comment');
        return $this->hasMany(Comment::class);
    }

    // News
    public function articles(){
        return $this->belongsToMany(NewsArticle::class);
    }

    public function newsComments(){
        return $this->hasMany(NewsComment::class);
    }

}
