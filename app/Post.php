<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tag(){
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
