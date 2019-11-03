<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'body'];
    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo(Thread::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->latest();
    }

}
