<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function tags()
    {
        return $this->hasMany('App\PostTag');
    }
    public function categories()
    {
        return $this->hasMany('App\PostCategory');
    }
    public function types()
    {
        return $this->hasOne('App\PostType');
    }
    public function author()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
