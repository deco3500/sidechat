<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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

    public function discussions()
    {
        return $this->hasMany('App\Discussion');
    }

    public function addDiscussion(Discussion $discussion)
    {
        return $this->discussions()->save($discussion);
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function addComment(Comment $comment)
    {
        return $this->comments()->save($comment);
    }
}
