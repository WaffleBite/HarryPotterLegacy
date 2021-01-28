<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'news_tags')->withTimestamps();
    }
}
