<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function comments()
    {
      return $this->hasMany(Comment::class);
    }

    public function addToWatchlist(){
      return $this->hasMany(Watch::class);
    }
}
